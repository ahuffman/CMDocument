<html>
  <body>
    <?php
      $config = parse_ini_file("./cmdocument.ini.php",false);
      $dbuser = $config['user'];
      $dbpass = $config['pass'];
      $dbname = $config['dbname'];
      $host = $config['hostname'];
      $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $dbuser . ' password=' . $dbpass) or die('Could not connect');
      if(isset($_POST['referer'])){$referer = pg_escape_string($_POST['referer']);}
      if ($referer=="register.php") {
        if(isset($_POST['user_date'])) {
          $date = $_POST['user_date'];
          $salt = hash(sha256,"$date"); //creating random salt based off of the date we're attempting to register - to be inserted to user table
        }
        $firstlogindate = str_replace(' ','',date("D M d, Y G:i")); //don't want a chance of having a reproducable salt from a temporary stored db value
        //validate unique username
        if(isset($_POST['user_login'])) {
          $qry_users = pg_query($db, "SELECT user_login FROM cmd_users");
          $user_login = strtolower(pg_escape_string($_POST['user_login']));
          while($users = pg_fetch_assoc($qry_users)) {
            if($user_login==$users['user_login']) {
              echo 'Username already exists.  Please provide a unique username.' . '<br />' . "\r\n";
              echo 'User Registration Failed.' . '<br />' . "\r\n";
              header('Refresh: 3; URL=register.php');
              exit();
            }
            //validate non-null username
            else if($user_login=="") {
              echo 'No username provided.' . '<br />' . "\r\n";
              echo 'User Registration Failed.' . '<br />' . "\r\n";
              header('Refresh: 3; URL=register.php');
              exit();
            }
          }
        }
        if(isset($_POST['user_pass'])) {
          $ip = $_SERVER['REMOTE_ADDR'];
          $pass = pg_escape_string($_POST['user_pass']);
          //validate we have a non-null password
          if ($pass=="") {
            echo 'No password provided.' . '<br />' . "\r\n";
            echo 'User Registration Failed.' . '<br />' . "\r\n";
            header('Refresh: 3; URL=register.php');
            exit();
          }
        if(isset($_POST['user_firstname'])) {
          $user_firstname = pg_escape_string($_POST['user_firstname']);
          //validate we have a non-null firstname
          if($user_firstname=="") {
            echo 'No user firstname provided.' . '<br />' . "\r\n";
            echo 'User Registration Failed.' . '<br />' . "\r\n";
            header('Refresh: 3; URL=register.php');
            exit();
          }
        }
        if(isset($_POST['user_lastname'])) {
          $user_lastname = pg_escape_string($_POST['user_lastname']);
          if($user_lastname=="") {
            echo 'No user lastname provided.' . '<br />' . "\r\n";
            echo 'User Registration Failed.' . '<br />' . "\r\n";
            header('Refresh: 3; URL=register.php');
            exit();
          }
        }
          $saltpass = $salt . $pass;
          $hash = hash('sha256',"$saltpass"); //creating salted hashed password - to be inserted to user table
          $qry_register = pg_query($db, "INSERT INTO cmd_users(user_login, user_pass, user_salt, user_firstname, user_lastname, user_ip, user_session, user_lastlogin, user_loginfail) VALUES('$user_login', '$hash', '$salt', '$user_firstname', '$user_lastname', '$ip', 'x', '$firstlogindate', '0')");
          if(!$qry_register) {
            echo 'Registration failed due to database error.';
          }
          else {
            echo 'Registration of new user ' . $user_login . ' was successful.' . '<br />' . "\r\n";
            header('Refresh: 3; URL=login.php');
          }
        }
      }
      else {
        $date = str_replace(' ','',date("D M d, Y G:i")); //creates random salt off of the date string to harden password
        echo '<i><b>User Registration</b></i>' . '<br />' .
        '<form action="register.php" id="register" method="post">' . "\r\n" . 
        'Username: ' . "\r\n" .
        '<input type="text" name="user_login" value="">' . '<br />' . "\r\n" .
        'Password: ' . "\r\n" .
        '<input type="password" name="user_pass" value="">' . '<br />' . "\r\n" .
        'Firstname: ' . "\r\n" . 
        '<input type="text" name="user_firstname" value="">' . '<br />' . "\r\n" . 
        'Lastname: ' . "\r\n" .
        '<input type="text" name="user_lastname" value="">' . '<br />' . "\r\n" .
        '<input type="hidden" name="user_date" value="' . $date . '">' . '<br />' . "\r\n" .
        '<input type="hidden" name="referer" value="register.php">' . "\r\n" .
        '<input type="submit" name="submit" value="Register">' . "\r\n" .
        '<input type="reset" name="reset" value="Clear">' . '<br />' . "\r\n";
      }
    ?>
  </body>
</html>
