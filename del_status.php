<html>
  <body>
    <?php
      include './include/menu.php';
      if (isset($_POST['status_id'])) {$status_id = pg_escape_string($_POST['status_id']);} else {echo 'No value provided: status id.'; exit();}
      if (isset($_POST['status'])) {$status = pg_escape_string($_POST['status']);} else {echo 'No value provided: status.'; exit();}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);} else {echo 'No value provided: referer.'; exit();}
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_status WHERE status_id=$status_id");
        if (!$delete) {
          echo '<div class="message>' . "\r\n" . 'Delete Failed.' . "\r\n" . '</div>' . "\r\n";
          header("Refresh: $msg_display_time; URL=$ref");
        }
        else {
          echo '<div class="message>' . "\r\n" . 'Deleted ' . $status . ' from the database.' . "\r\n" . '</div>' . "\r\n";
          header("Refresh: $msg_display_time; URL=$ref");
        }
      }
    ?>
  </body>
</html>
