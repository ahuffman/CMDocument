<html>
  <body>
    <?php
      include './include/menu.php';
      if (isset($_POST['disk_raid_type_id'])) {$disk_raid_type_id = pg_escape_string($_POST['disk_raid_type_id']);} else {echo 'No value provided: Disk RAID type id.'; exit();}
      if (isset($_POST['disk_raid_type'])) {$disk_raid_type = pg_escape_string($_POST['disk_raid_type']);} else {echo 'No value provided: Disk RAID type.'; exit();}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);} else {echo 'No value provided: referer.'; exit();}
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_disk_raid_type WHERE disk_raid_type_id=$disk_raid_type_id");
        if (!$delete) {
          echo '<div class="message">' . "\r\n" . 'Delete Failed.' . "\r\n" . '</div>' . "\r\n";
          header("Refresh: $msg_display_time; URL=$ref");
        }
        else {
          echo '<div class="message">' . "\r\n" . 'Deleted ' . $disk_raid_type . ' from the database.' . "\r\n" . '</div>' . "\r\n";
          header("Refresh: $msg_display_time; URL=$ref");
        }
      }
    ?>
  </body>
</html>
