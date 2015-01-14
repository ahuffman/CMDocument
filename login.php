<html>
  <body>
    <?php
      $config = parse_ini_file("./cmdocument.ini.php",false);
      $user = $config['user'];
      $pass = $config['pass'];
      $dbname = $config['dbname'];
      $host = $config['hostname'];
      $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $user . ' password=' . $pass) or die('Could not connect');
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);}
      $user_pass = '';
      $user_login = '';
      if (!isset($_POST['referer'])) {
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
            echo 'Account locked. Please contact your Administrator' . '<br />' . "\r\n";
            header('Refresh: 3; URL=login.php');
          }
          else {
            //not at max login attempts limit
            $saltpass = $userrow['user_salt'] . $user_pass;
            $hash = hash('sha512',"$saltpass");
            if ($hash == $userrow['user_pass']) {
              //successful login check
              //grab more user data from the db for sessions
              
              //display welcome message
              echo 'Login Check Passed';
              //create a session token
              
              //set the logintime/date
              
              //set the loginfail to 0 since we're now successful
              
              //update the cmd_users table with session info
              
              //start a session and set variables
            }
            else {
              $failcount = $userrow['user_loginfail'];
              $failcount++;
              $qry_loginfail = pg_query($db, "UPDATE cmd_users SET user_loginfail=$failcount WHERE user_login='$user_login'");
              echo 'Bad username or password.' . '<br />' . "\r\n";
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
