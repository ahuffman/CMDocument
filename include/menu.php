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
  $check_login_page = fnmatch('*login.php', $_SERVER['SCRIPT_NAME']); //looking to see if we're on login.php
  $check_logout_page = fnmatch('*logout.php', $_SERVER['SCRIPT_NAME']); //looking to see if we're on logout.php
  $check_settings_page = fnmatch('*set_*.*', $_SERVER['SCRIPT_NAME']); //looking to see if we're on a settings page to assign a class
  //start user session
  session_start();
  session_write_close();
  if (!$check_login_page) { 
    //we're not on login page change to login.php if no session - prevent permanent loop
    if (!isset($_SESSION['user_login'])) {
      echo 'You must login first.';
      header("Refresh: $msg_display_time; URL=login.php");
      exit();
    }
  }
  //header
  echo '<head>' . "\r\n" .
       '  <link rel="stylesheet" type="text/css" href="' . $url . '/css/cmdocument.css">' . "\r\n" .
       '</head>' . "\r\n";
              //debug
               // foreach ($_SESSION as $key=>$val)
               // echo $key. ": ".$val. "<br>";
  //create menu table
  echo '<div id="menublock">' . "\r\n" .
       '  <table id="topmenu">' . "\r\n" .
       '    <tr>' . "\r\n" .
       '      <td class="title">' . "\r\n" .
       '        CMDocument' . "\r\n" .
       '      </td>' . "\r\n" .
       '    </tr>' . "\r\n" .
       '    <tr>' . "\r\n" .
       '      <td>' . "\r\n"; 
  if (!$check_login_page) {
    //not the login page (i.e. every other page) so show user the logout link
       echo 
         '      <table class="main_menu">' . "\r\n" .
         '        <tr>' . "\r\n"; 
         if (!$check_settings_page) {
           //not a settings page so don't mark as class active
           echo '          <td>' . "\r\n" .
                '            <a href="set_gen.html">Settings</a>' . "\r\n";
         }
         else {
           echo '          <td class="topmenu_active">' . "\r\n" .
                '            <a href="set_gen.html">Settings</a>' . "\r\n";
         }
         echo
         '          </td>' . "\r\n" .
         '          <td>' . "\r\n" .
         '          </td>' . "\r\n" .
         '        </tr>' . "\r\n" .
         '      </table>' . "\r\n" .
         '      <table class="user_menu">' . "\r\n" .
         '        <tr>' . "\r\n" .
         '          <td>' . "\r\n" .
         '            <a href="' . $url . '/account.php">' . $_SESSION['user_login'] . '</a>' . "\r\n" .
         '          </td>' . "\r\n" .
         '          <td>' . "\r\n" .
         '            <a href="' . $url . '/logout.php">Logout' . '</a>' . "\r\n" .
         '          </td>' . "\r\n"; 
  }
  //otherwise just build table with app title
  echo   '        </tr>' . "\r\n" .
         '      </table>' . "\r\n" .
         '      </td>' . "\r\n" .
         '    </tr>' . "\r\n" .
         '  </table>' . "\r\n" .
         '</div>' . "\r\n"; 
?>
