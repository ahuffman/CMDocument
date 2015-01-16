<html>
  <body>
    <?php
      include './include/menu.php';
      if (isset($_POST['user_id'])) {$user_id = pg_escape_string($_POST['user_id']);} else {echo 'No value provided: user id.'; exit();}
      if (isset($_POST['user_login'])) {$user_login = pg_escape_string($_POST['user_login']);} else {echo 'No value provided: user login.'; exit();}
      if (isset($_POST['user_firstname'])) {$user_firstname = pg_escape_string($_POST['user_firstname']);} else {echo 'No value provided: user firstname.'; exit();}
      if (isset($_POST['user_lastname'])) {$user_lastname = pg_escape_string($_POST['user_lastname']);} else {echo 'No value provided: user lastname.'; exit();}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);} else {echo 'No value provided: referer.'; exit();}
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_users WHERE user_id='$user_id'");
        if (!$delete) {
          echo 'Delete Failed.';
          header("Refresh: $msg_display_time; URL=$ref");
        }
        else {
          echo 'Deleted ' . $user_login . ' - ' . $user_firstname . ' ' . $user_lastname . ' from the database.' . '<br />';
          header("Refresh: $msg_display_time; URL=$ref");
        }
      }
    ?>
  </body>
</html>
