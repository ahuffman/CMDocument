<html>
  <body>
    <?php
      $config = parse_ini_file("./cmdocument.ini.php",false);
      $user = $config['user'];
      $pass = $config['pass'];
      $dbname = $config['dbname'];
      $host = $config['hostname'];
      $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $user . ' password=' . $pass) or die('Could not connect');
      $user_pass = '';
      $user_login = '';
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);}
      //check for where the user came from
      if (!isset($_POST['referer'])) {
        //not a post or not a valid post so we'll display the login form but we'll have to add something in here to check for the session as well later
        echo '  <form action="login.php" id="login" method="POST">' . "\r\n" .
        '    Username:' . "\r\n" .
        '    <input type="text" name="user_login">' . '<br />' . "\r\n" .
        '    Password:' . "\r\n" .
        '    <input type="password" name="user_pass">' . '<br />' . "\r\n" .
        '    <input type="hidden" name="referer" value="login.php">' . "\r\n" .
        '    <input type="submit" name="submit" value="Login">' . "\r\n" .
        '    <input type="reset" name="reset" value="Clear">' . "\r\n" .
        '  </form>' . "\r\n";
      }
      else if ($ref=="login.php") {
        //proper login form submit
        if (isset($_POST['user_login'])) {$user_login = pg_escape_string($_POST['user_login']);}
        if (isset($_POST['user_pass'])) {$user_pass = pg_escape_string($_POST['user_pass']);}
        $qry_user = pg_query($db, "SELECT user_pass,user_salt,user_loginfail FROM cmd_users WHERE user_login='$user_login'");
        if (pg_num_rows($qry_user) <= 0) {
          //user entered a username not registered in the db
          echo 'Bad username or password.' . '<br />' . "\r\n";
          header('Refresh: 3; URL=login.php');
          exit();
        }
        else {
          $userrow = pg_fetch_assoc($qry_user);
          if ($userrow['user_loginfail'] >= $config['max_login_attempts']) {
            //max logins reached and account is locked
            echo 'Account locked. Please contact <a href="mailto:' . $config['admin_email'] . '">' . $config['admin_email'] . '</a>' . '.' . '<br />' . "\r\n";
            header('Refresh: 3; URL=login.php');
            exit();
          }
          else {
            //not at max login attempts limit
            $saltpass = $userrow['user_salt'] . $user_pass;
            $hash = hash('sha512',"$saltpass");
            if ($hash == $userrow['user_pass']) {
              //successful login check
              //grab more user data from the db for sessions
              $qry_user = pg_query($db,"SELECT * FROM cmd_users WHERE user_login='$user_login'");
              $userrow = pg_fetch_assoc($qry_user);
              //create a session token
              $date = date(DATE_RFC2822);
              $token = hash('sha512',$userrow['user_salt'] . str_replace(' ','',$date));
              //set the logindate
              $logindate = $date;
              //set the loginfail to 0 since we're now successful
              $loginfail = 0;
              //get the user IP address
              $login_ip = $_SERVER['REMOTE_ADDR'];
              //update the cmd_users table with session info
              $qry_login = pg_query($db,"UPDATE cmd_users SET user_session='$token', user_ip='$login_ip', user_lastlogin='$date', user_loginfail='$loginfail' WHERE user_login='$user_login'");
              //display welcome message
              echo 'Welcome ' . $userrow['user_firstname'] . '!' . '<br />' . '<br />' . "\r\n" .
              $userrow['user_login'] . ' last logged in from ' . $userrow['user_ip'] . ' on ' . $userrow['user_lastlogin'] . '<br />' . "\r\n" .
              'Currently logged in from ' . $login_ip . ' at ' . $date . '<br />' . "\r\n";
              //start a session and set variables
              session_start();
              $_SESSION['user_login'] = $user_login;
              $_SESSION['token'] = $token;
              $_SESSION['user_firstname'] = $userrow['user_firstname'];
              $_SESSION['user_lastname'] = $userrow['user_lastname'];
              $_SESSION['user_ip'] = $login_ip;
              session_write_close();
              //debug
              //  foreach ($_SESSION as $key=>$val)
              //  echo $key. ": ".$val. "<br>";
              header('Refresh: 3; URL=set_gen.html');
            }
            else {
              //bad password
              $failcount = $userrow['user_loginfail'];
              //increment the failed login attempt count
              $failcount++;
              //update the failed login attempt count for the user in the users table.
              $qry_loginfail = pg_query($db, "UPDATE cmd_users SET user_loginfail=$failcount WHERE user_login='$user_login'");
              echo 'Bad username or password.' . '<br />' . "\r\n";
              //display problem to the end user
              $remaining = $config['max_login_attempts'] - $failcount;
              echo 'You have ' . $remaining . ' bad login attempts remaining.';
              header('Refresh: 3; URL=login.php');
              exit();
            }
          }
        }
      }
    ?>
  </body>
</html>
