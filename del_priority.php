<html>
    <?php
      $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
      if (isset($_POST['priority_id'])) {$priority_id = pg_escape_string($_POST['priority_id']);}
      if (isset($_POST['priority'])) {$priority = pg_escape_string($_POST['priority']);}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);}
      echo '  <head>' . '<META HTTP-EQUIV=Refresh CONTENT="3;URL=' . $ref . '/">' . '</head>' . '<body>';
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_priority WHERE priority_id=$priority_id");
        if (!$delete) {
        echo 'Delete Failed.';
        }
        else {
        echo 'Deleted ' . $priority . ' from the database.' . '<br />';
        }
      }
    ?>
  </body>
</html>
