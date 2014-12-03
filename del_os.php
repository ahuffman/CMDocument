<html>
    <?php
      $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
      if (isset($_POST['os_id'])) {$os_id = pg_escape_string($_POST['os_id']);}
      if (isset($_POST['os'])) {$os = pg_escape_string($_POST['os']);}
      if (isset($_POST['os_ver'])) {$os_ver = pg_escape_string($_POST['os_ver']);}
      if (isset($_POST['arch'])) {$arch = pg_escape_string($_POST['arch']);}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);}
      echo '  <head>' . '<META HTTP-EQUIV=Refresh CONTENT="3;URL=' . $ref . '">' . '</head>' . '<body>';
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_os WHERE os_id=$os_id");
        if (!$delete) {
        echo 'Delete Failed.';
        }
        else {
        echo 'Deleted ' . $os . ' ' . $os_ver . ' ' . $arch . ' from the database.' . '<br />';
        }
      }
    ?>
  </body>
</html>
