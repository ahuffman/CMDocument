<html>
    <?php
      $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
      if (isset($_POST['int_type_id'])) {$int_type_id = pg_escape_string($_POST['int_type_id']);}
      if (isset($_POST['int_type'])) {$int_type = pg_escape_string($_POST['int_type']);}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);}
      echo '  <head>' . '<META HTTP-EQUIV=Refresh CONTENT="3;URL=' . $ref . '">' . '</head>' . '<body>';
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_interface_type WHERE int_type_id=$int_type_id");
        if (!$delete) {
        echo 'Delete Failed.';
        }
        else {
        echo 'Deleted ' . $int_type . ' from the database.' . '<br />';
        }
      }
    ?>
  </body>
</html>
