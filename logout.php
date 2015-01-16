<?php
  include './include/menu.php';
  //clear the session data
  $_SESSION = array();
  //destroy the session cookie
  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
  }
  //destroy the session
  session_destroy();
  if (!isset($_SESSION['user_login'])) {
    echo 'User logged out successfully';
    header("Refresh: $msg_display_time; URL=login.php");
    exit();
  }
?>
