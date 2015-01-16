<?php
  $config = parse_ini_file("./cmdocument.ini.php",false);
  $url = $config['url'];
  $dbuser = $config['user'];
  $dbpass = $config['pass'];
  $dbname = $config['dbname'];
  $dbhost = $config['hostname'];
  session_start();
  session_write_close();
  $db = pg_connect('host=' . $dbhost . ' dbname=' . $dbname . ' user=' . $dbuser . ' password=' . $dbpass) or die('Could not connect');
  if (!isset($_SESSION['user_login'])) {
    echo 'You must login first.';
    header("Refresh: 3; URL=$url/login.php");
    exit();
  }
?>
