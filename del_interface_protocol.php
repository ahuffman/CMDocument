<html>
    <?php
      $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
      if (isset($_POST['int_proto_id'])) {$int_proto_id = pg_escape_string($_POST['int_proto_id']);}
      if (isset($_POST['int_proto'])) {$int_proto = pg_escape_string($_POST['int_proto']);}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);}
      echo '  <head>' . '<META HTTP-EQUIV=Refresh CONTENT="3;URL=' . $ref . '">' . '</head>' . '<body>';
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_interface_protocol WHERE int_proto_id=$int_proto_id");
        if (!$delete) {
        echo 'Delete Failed.';
        }
        else {
        echo 'Deleted ' . $int_proto . ' from the database.' . '<br />';
        }
      }
    ?>
  </body>
</html>
