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
    if (isset($_POST['user_login'])) {$user_login = pg_escape_string($_POST['user_login']);}
    if (isset($_POST['pass_login'])) {$pass_login = pg_escape_string($_POST['pass_login']);}
    if (!isset($_POST['referer'])) {
      echo '  <form id="login" method="post">' . "\r\n" .
      '    Username:' . "\r\n" .
      '    <input type="text" name="user_login">' . '<br />' . "\r\n" .
      '    Password:' . "\r\n" .
      '    <input type="text" name="pass_login">' . '<br />' . "\r\n" .
      '    <input type="hidden" name="referer" value="login.php">' . "\r\n" .
      '    <input type="submit" name="submit" value="Login">' . "\r\n" .
      '    <input type="reset" name="reset" value="Clear">' . "\r\n" .
      '  </form>' . "\r\n";
    }
    else if ($ref=="login.php") {
        session_start();
        if(isset($_SESSION['use'])) {
          header("location:set_gen.html");
          echo 'Already Logged In.' . '<br />' . "\r\n";
        }
        else {
          session_start();
          $_SESSION['login_user']= $user_login;
          echo 'Session started:' . '<br />' .
          $_SESSION['login_user'];
          echo '<form id="logout" method="post">' . "\r\n" . 
          '  <input type="button" name="logout" value="Logout">' . "\r\n"; //add session destroy code: session_destroy()
        }
    }
?>
</body>
</html>
