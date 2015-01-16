<?php
  //set global CMDocument variables
  $config = parse_ini_file("./cmdocument.ini.php",false);
  $url = $config['url'];
  $dbuser = $config['user'];
  $dbpass = $config['pass'];
  $dbname = $config['dbname'];
  $dbhost = $config['hostname'];
  $db = pg_connect('host=' . $dbhost . ' dbname=' . $dbname . ' user=' . $dbuser . ' password=' . $dbpass) or die('Could not connect');
  $msg_display_time = $config['msg_display_time'];
  //start user session
  session_start();
  session_write_close();
  if (!isset($_SESSION['user_login'])) {
    echo 'You must login first.';
    header("Refresh: $msg_display_time; URL=login.php");
    exit();
  }
              //debug
//                foreach ($_SESSION as $key=>$val)
//                echo $key. ": ".$val. "<br>";
  //create menu table
  echo '<table>' . "\r\n" .
       '  <tr>' . "\r\n" .
       '    <td>' . "\r\n" .
       '      <b>CMDocument</b>' . "\r\n" .
       '    </td>' . "\r\n" .
       '  </tr>' . "\r\n" .
       '  <tr>' . "\r\n" .
       '    <td>' . "\r\n" .
       '      <a href="' . $url . '/logout.php">Logout: ' . $_SESSION['user_login'] . '</a>' . "\r\n" .
       '    </td>' . "\r\n" .
       '  </tr>' . "\r\n" .
       '</table>' . "\r\n";
?>
