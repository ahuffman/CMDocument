<html>
  <body>
    <?php
      if(isset($_POST['referer'])){$referer = pg_escape_string($_POST['referer']);}
      if ($referer=="register.php") {
        if(isset($_POST['user_date'])) {
          $date = $_POST['user_date'];
          $salt = hash(sha256,"$date"); //creating random salt based off of the date we're attempting to register - to be inserted to user table
        }
        if(isset($_POST['user_firstname'])) {$user_firstname = pg_escape_string($_POST['user_firstname']);}
        if(isset($_POST['user_lastname'])) {$user_lastname = pg_escape_string($_POST['user_lastname']);}
        $firstlogindate = str_replace(' ','',date("D M d, Y G:i")); //don't want a chance of having a reproducable salt from a temporary stored db value
        if(isset($_POST['user_pass'])) {
          $config = parse_ini_file("./cmdocument.ini.php",false);
          $dbuser = $config['user'];
          $dbpass = $config['pass'];
          $dbname = $config['dbname'];
          $host = $config['hostname'];
          $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $dbuser . ' password=' . $dbpass) or die('Could not connect');
          $ip = $_SERVER['REMOTE_ADDR'];
          $pass = pg_escape_string($_POST['user_pass']);
          $hash = hash(sha256,"$salt" + "$pass"); //creating salted hashed password - to be inserted to user table
          $qry_register = pg_query($db, "INSERT INTO cmd_users(user_login, user_pass, user_salt, user_firstname, user_lastname, user_ip, user_session, user_lastlogin, user_loginfail) VALUES('$user', '$hash', '$salt', '$user_firstname', '$user_lastname', '$ip', 'x', '$firstlogindate', '0')");
          if(!$qry_register) {
            echo 'Registration failed due to database error.';
          }
          else {
            echo 'Registration of new user ' . $user . 'was successful.' . '<br />' . "\r\n";
            header('Refresh: 3; URL=login.php');
          }
        }
        else {
          echo 'Password not provided.';
          //redirect to registration page
          header("location:register.php");          
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
