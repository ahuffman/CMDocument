<html>
  <body>
    <?php
      if(isset($_POST['referer'])){$referer = pg_escape_string($_POST['referer']);}
      if ($referer=="register.php") {
        echo 'Refered.' . '<br />';
        $date = str_replace(' ','',date("D M d, Y G:i"));
        $salt = hash(sha256,"$date"); //creating random salt based off of the date we're attempting to register
        if(isset($_POST['user_pass'])) {
          $pass = pg_escape_string($_POST['user_pass']);
          $hash = hash(sha256,"$date" + "$pass"); //creating hashed password
          echo $pass . '<br />' . $salt . '<br />' . $hash . '<br />';
        }
        else {
          echo 'Password not provided.';
          //redirect to registration page
          header("location:register.php");          
        } 
        //attempt to insert user data cmd_users table
      }
      else {
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
        '<input type="hidden" name="referer" value="register.php">' . "\r\n" .
        '<input type="submit" name="submit" value="Register">' . "\r\n" .
        '<input type="reset" name="reset" value="Clear">' . '<br />' . "\r\n";
      }
    ?>
  </body>
</html>
