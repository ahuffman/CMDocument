<html>
    <?php
      $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
      if (isset($_POST['sw_id'])) {$sw_id = pg_escape_string($_POST['sw_id']);}
      if (isset($_POST['software'])) {$software = pg_escape_string($_POST['software']);}
      if (isset($_POST['sw_ver'])) {$sw_ver = pg_escape_string($_POST['sw_ver']);}
      if (isset($_POST['vend'])) {$vend = pg_escape_string($_POST['vend']);}
      if (isset($_POST['arch'])) {$arch = pg_escape_string($_POST['arch']);}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);}
      echo '  <head>' . '<META HTTP-EQUIV=Refresh CONTENT="3;URL=' . $ref . '">' . '</head>' . '<body>';
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_software WHERE sw_id=$sw_id");
        if (!$delete) {
        echo 'Delete Failed.';
        }
        else {
        echo 'Deleted ' . $vend . ' ' . $software . ' ' . $sw_ver . ' ' . $arch . ' from the database.' . '<br />';
        }
      }
    ?>
  </body>
</html>
