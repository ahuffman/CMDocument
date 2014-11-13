<html>
    <?php
      $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
      if (isset($_POST['status_id'])) {$status_id = pg_escape_string($_POST['status_id']);}
      if (isset($_POST['status'])) {$status = pg_escape_string($_POST['status']);}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);}
      echo '  <head>' . '<META HTTP-EQUIV=Refresh CONTENT="3;URL=' . $ref . '">' . '</head>' . '<body>';
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_status WHERE status_id=$status_id");
        if (!$delete) {
        echo 'Delete Failed.';
        }
        else {
        echo 'Deleted ' . $status . ' from the database.' . '<br />';
        }
      }
    ?>
  </body>
</html>
