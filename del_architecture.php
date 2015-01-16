<html>
  <body>
    <?php
      include './include/menu.php';
      if (isset($_POST['arch_id'])) {$arch_id = pg_escape_string($_POST['arch_id']);} else {echo 'No value provided: architecture id.'; exit();}
      if (isset($_POST['arch'])) {$arch = pg_escape_string($_POST['arch']);} else {echo 'No value provided: architecture.'; exit();}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);} else {echo 'No value provided: referer.'; exit();}
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_architecture WHERE arch_id=$arch_id");
        if (!$delete) {
          echo 'Delete Failed.';
          header("Refresh: $msg_display_time; URL=$ref");
        }
        else {
          echo 'Deleted ' . $arch . ' from the database.' . '<br />';
          header("Refresh: $msg_display_time; URL=$ref");
        }
      }
    ?>
  </body>
</html>
