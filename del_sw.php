<html>
  <body>
    <?php
      include './include/menu.php';
      if (isset($_POST['sw_id'])) {$sw_id = pg_escape_string($_POST['sw_id']);} else {echo 'No value provided: software id.'; exit();}
      if (isset($_POST['software'])) {$software = pg_escape_string($_POST['software']);} else {echo 'No value provided: software.'; exit();}
      if (isset($_POST['sw_ver'])) {$sw_ver = pg_escape_string($_POST['sw_ver']);} else {echo 'No value provided: software version.'; exit();}
      if (isset($_POST['vend_id'])) {$vend_id = pg_escape_string($_POST['vend_id']);} else {echo 'No value provided: vendor id.'; exit();}
      if (isset($_POST['arch'])) {$arch = pg_escape_string($_POST['arch']);} else {echo 'No value provided: architecture.'; exit();}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);} else {echo 'No value provided: referer.'; exit();}
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_software WHERE sw_id=$sw_id");
        if (!$delete) {
          echo 'Delete Failed.';
          header("Refresh: $msg_display_time; URL=$ref");
        }
        else {
          echo 'Deleted ' . $vend . ' ' . $software . ' ' . $sw_ver . ' ' . $arch . ' from the database.' . '<br />';
          header("Refresh: $msg_display_time; URL=$ref");
        }
      }
    ?>
  </body>
</html>
