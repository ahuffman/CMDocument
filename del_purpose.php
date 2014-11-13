<html>
    <?php
      $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
      if (isset($_POST['purpose_id'])) {$purpose_id = pg_escape_string($_POST['purpose_id']);}
      if (isset($_POST['purpose'])) {$purpose = pg_escape_string($_POST['purpose']);}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);}
      echo '  <head>' . '<META HTTP-EQUIV=Refresh CONTENT="3;URL=' . $ref . '">' . '</head>' . '<body>';
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_purpose WHERE purpose_id=$purpose_id");
        if (!$delete) {
        echo 'Delete Failed.';
        }
        else {
        echo 'Deleted ' . $purpose . ' from the database.' . '<br />';
        }
      }
    ?>
  </body>
</html>
