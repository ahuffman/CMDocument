<html>
  <body>
    <?php
      include './include/menu.php';
      if (isset($_POST['disk_type_id'])) {$disk_type_id = pg_escape_string($_POST['disk_type_id']);} else {echo 'No value provided: disk type id.'; exit();}
      if (isset($_POST['disk_type'])) {$disk_type = pg_escape_string($_POST['disk_type']);} else {echo 'No value provided: disk type.'; exit();}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);} else {echo 'No value provided: referer.'; exit();}
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_disk_type WHERE disk_type_id=$disk_type_id");
        if (!$delete) {
          echo 'Delete Failed.';
          header("Refresh: $msg_display_time; URL=$ref");
        }
        else {
          echo 'Deleted ' . $disk_type . ' from the database.' . '<br />';
          header("Refresh: $msg_display_time; URL=$ref");
        }
      }
    ?>
  </body>
</html>
