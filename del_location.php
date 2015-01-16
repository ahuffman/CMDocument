<html>
  <body>
    <?php
      include './include/menu.php';
      if (isset($_POST['location_id'])) {$location_id = pg_escape_string($_POST['location_id']);} else {echo 'No value provided: location id.'; exit();}
      if (isset($_POST['location_name'])) {$location_name = pg_escape_string($_POST['location_name']);} else {echo 'No value provided: location name.'; exit();}
      if (isset($_POST['location_address'])) {$location_address = pg_escape_string($_POST['location_address']);} else {echo 'No value provided: location address.'; exit();}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);} else {echo 'No value provided: referer.'; exit();}
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_locations WHERE location_id=$location_id");
        if (!$delete) {
          echo 'Delete Failed:' . '<br />' . "\r\n";
          header("Refresh: $msg_display_time; URL=$ref");
        }
        else {
          echo 'Deleted ' . $location_name . ' - ' . $location_address . ' from the database.' . '<br />';
          header("Refresh: $msg_display_time; URL=$ref");
        }
      }
    ?>
  </body>
</html>
