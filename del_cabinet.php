<html>
    <?php
      $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
      if (isset($_POST['cab_id'])) {$cab_id = pg_escape_string($_POST['cab_id']);}
      if (isset($_POST['cab_name'])) {$cab_name = pg_escape_string($_POST['cab_name']);}
      if (isset($_POST['location_name'])) {$location_name = pg_escape_string($_POST['location_name']);}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);}
      echo '  <head>' . '<META HTTP-EQUIV=Refresh CONTENT="3;URL=' . $ref . '">' . '</head>' . '<body>';
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_cabinets WHERE cab_id=$cab_id");
        if (!$delete) {
        echo 'Delete Failed.';
        }
        else {
        echo 'Deleted ' . $cab_name . ' - ' . $location_name . ' from the database.' . '<br />';
        }
      }
    ?>
  </body>
</html>
