<html>
  <body>
    <?php
      include './include/menu.php';
      if (isset($_POST['cpu_type_id'])) {$cpu_type_id = pg_escape_string($_POST['cpu_type_id']);} else {echo 'No value provided: cpu type id.'; exit();}
      if (isset($_POST['cpu_type_model'])) {$cpu_type_model = pg_escape_string($_POST['cpu_type_model']);} else {echo 'No value provided: CPU Model.'; exit();}
      if (isset($_POST['cpu_type_cores'])) {$cpu_type_cores = pg_escape_string($_POST['cpu_type_cores']);} else {echo 'No value provided: CPU Cores.'; exit();}
      if (isset($_POST['vend_id'])) {$vend = pg_escape_string($_POST['vend_id']);} else {echo 'No value provided: vendor id.'; exit();}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);} else {echo 'No value provided: referer.'; exit();}
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_cpu_type WHERE cpu_type_id=$cpu_type_id");
        if (!$delete) {
          echo 'Delete Failed.';
          header("Refresh: $msg_display_time; URL=$ref");
        }
        else {
          echo 'Deleted ' . $vend . ' ' . $cpu_type_model . ' - ' . $cpu_type_cores . ' Core(s) from the database.' . '<br />';
          header("Refresh: $msg_display_time; URL=$ref");
        }
      }
    ?>
  </body>
</html>
