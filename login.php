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
//      if (isset($_POST['user_login'])) {$user_login = pg_escape_string($_POST['user_login']);}
//      if (isset($_POST['user_pass'])) {$user_pass = pg_escape_string($_POST['user_pass']);}
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
        $qry_user = pg_query($db, "SELECT * FROM cmd_users WHERE user_login='$user_login'");
        if (pg_num_rows($qry_user) <= 0) {
          //user entered a username not registered in the db
          echo 'Bad username or password.' . '<br />' . "\r\n";
          header('Refresh: 3; URL=login.php');
        }
        else {
          $userrow = pg_fetch_assoc($qry_user); 
          $saltpass = $userrow['user_salt'] . $user_pass;
          $hash = hash('sha512',"$saltpass");
          if ($hash == $userrow['user_pass']) {
            //start working on a sesison
            echo 'Login Check Passed';
          }
          else {
            echo 'Login Check Failed.' . '<br />';
          }
        }
      }
    ?>
  </body>
</html>
