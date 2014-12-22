<html>
    <?php
      $config = parse_ini_file("./cmdocument.ini.php",false);
      $user = $config['user'];
      $pass = $config['pass'];
      $dbname = $config['dbname'];
      $host = $config['hostname'];
      $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $user . ' password=' . $pass) or die('Could not connect');
      if (isset($_POST['location_id'])) {$location_id = pg_escape_string($_POST['location_id']);}
      if (isset($_POST['location_name'])) {$location_name = pg_escape_string($_POST['location_name']);}
      if (isset($_POST['location_address'])) {$location_address = pg_escape_string($_POST['location_address']);}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);}
      echo '  <head>' . '<META HTTP-EQUIV=Refresh CONTENT="3;URL=' . $ref . '">' . '</head>' . '<body>';
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_locations WHERE location_id=$location_id");
        if (!$delete) {
          echo 'Delete Failed:' . '<br />' . "\r\n";
          echo pg_last_error($db);
        }
        else {
        echo 'Deleted ' . $location_name . ' - ' . $location_address . ' from the database.' . '<br />';
        }
      }
    ?>
  </body>
</html>
