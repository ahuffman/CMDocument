<html>
    <?php
      $config = parse_ini_file("./cmdocument.ini.php",false);
      $user = $config['user'];
      $pass = $config['pass'];
      $dbname = $config['dbname'];
      $host = $config['hostname'];
      $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $user . ' password=' . $pass) or die('Could not connect');
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
