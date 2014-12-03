<html>
    <?php
      $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
      if (isset($_POST['location_id'])) {$location_id = pg_escape_string($_POST['location_id']);}
      if (isset($_POST['location_name'])) {$location_name = pg_escape_string($_POST['location_name']);}
      if (isset($_POST['location_address'])) {$location_address = pg_escape_string($_POST['location_address']);}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);}
      echo '  <head>' . '<META HTTP-EQUIV=Refresh CONTENT="3;URL=' . $ref . '">' . '</head>' . '<body>';
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_locations WHERE location_id=$location_id");
        if (!$delete) {
        echo 'Delete Failed.';
        }
        else {
        echo 'Deleted ' . $location_name . ' - ' . $location_address . ' from the database.' . '<br />';
        }
      }
    ?>
  </body>
</html>
