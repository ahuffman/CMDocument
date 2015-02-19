<html>
  <body>
    <?php
      include './include/menu.php';
      if (isset($_POST['cab_id'])) {$cab_id = pg_escape_string($_POST['cab_id']);} else {echo 'No value provided: cabinet id.'; exit();}
      if (isset($_POST['cab_name'])) {$cab_name = pg_escape_string($_POST['cab_name']);} else {echo 'No value provided: cabinet name.'; exit();}
      if (isset($_POST['location_id'])) {$location_id = pg_escape_string($_POST['location_id']);} else {echo 'No value provided: location id.'; exit();}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);} else {echo 'No value provided: referer.'; exit();}
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_cabinets WHERE cab_id=$cab_id");
        if (!$delete) {
          echo '<div class="message">' . "\r\n" . 'Delete Failed.' . "\r\n" . '</div>' . "\r\n";
          header("Refresh: $msg_display_time; URL=$ref");
        }
        else {
          echo '<div class="message">' . "\r\n" . 'Deleted ' . $cab_name . ' - ' . $location_name . ' from the database.' . "\r\n" . '</div>' . "\r\n";
          header("Refresh: $msg_display_time; URL=$ref");
        }
      }
    ?>
  </body>
</html>
