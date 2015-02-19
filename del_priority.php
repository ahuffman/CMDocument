<html>
  <body>
    <?php
      include './include/menu.php';
      if (isset($_POST['priority_id'])) {$priority_id = pg_escape_string($_POST['priority_id']);} else {echo 'No value provided: priority id.'; exit();}
      if (isset($_POST['priority'])) {$priority = pg_escape_string($_POST['priority']);} else {echo 'No value provided: priority.'; exit();}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);} else {echo 'No value provided: referer.'; exit();}
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_priority WHERE priority_id=$priority_id");
        if (!$delete) {
          echo '<div class="message>' . "\r\n" . 'Delete Failed.' . "\r\n" . '</div>' . "\r\n";
          header("Refresh: $msg_display_time; URL=$ref");
        }
        else {
          echo '<div class="message>' . "\r\n" . 'Deleted ' . $priority . ' from the database.' . "\r\n" . '</div>' . "\r\n";
          header("Refresh: $msg_display_time; URL=$ref");
        }
      }
    ?>
  </body>
</html>
