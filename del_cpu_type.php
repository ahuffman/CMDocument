<html>
    <?php
      $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
      if (isset($_POST['cpu_type_id'])) {$cpu_type_id = pg_escape_string($_POST['cpu_type_id']);}
      if (isset($_POST['cpu_type_model'])) {$cpu_type_model = pg_escape_string($_POST['cpu_type_model']);}
      if (isset($_POST['cpu_type_cores'])) {$cpu_type_cores = pg_escape_string($_POST['cpu_type_cores']);}
      if (isset($_POST['vend'])) {$vend = pg_escape_string($_POST['vend']);}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);}
      echo '  <head>' . '<META HTTP-EQUIV=Refresh CONTENT="3;URL=' . $ref . '">' . '</head>' . '<body>';
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_cpu_type WHERE cpu_type_id=$cpu_type_id");
        if (!$delete) {
        echo 'Delete Failed.';
        }
        else {
        echo 'Deleted ' . $vend . ' ' . $cpu_type_model . ' - ' . $cpu_type_cores . ' Core(s) from the database.' . '<br />';
        }
      }
    ?>
  </body>
</html>
