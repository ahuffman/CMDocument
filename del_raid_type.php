<html>
    <?php
      $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
      if (isset($_POST['disk_raid_type_id'])) {$disk_raid_type_id = pg_escape_string($_POST['disk_raid_type_id']);}
      if (isset($_POST['disk_raid_type'])) {$disk_raid_type = pg_escape_string($_POST['disk_raid_type']);}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);}
      echo '  <head>' . '<META HTTP-EQUIV=Refresh CONTENT="3;URL=' . $ref . '">' . '</head>' . '<body>';
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_disk_raid_type WHERE disk_raid_type_id=$disk_raid_type_id");
        if (!$delete) {
        echo 'Delete Failed.';
        }
        else {
        echo 'Deleted ' . $disk_raid_type . ' from the database.' . '<br />';
        }
      }
    ?>
  </body>
</html>
