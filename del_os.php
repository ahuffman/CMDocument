<html>
  <body>
    <?php
      include './include/menu.php';
      if (isset($_POST['os_id'])) {$os_id = pg_escape_string($_POST['os_id']);} else {echo 'No value provided: OS id.'; exit();}
      if (isset($_POST['os'])) {$os = pg_escape_string($_POST['os']);} else {echo 'No value provided: OS.'; exit();}
      if (isset($_POST['os_ver'])) {$os_ver = pg_escape_string($_POST['os_ver']);} else {echo 'No value provided: OS Version.'; exit();}
      if (isset($_POST['arch'])) {$arch = pg_escape_string($_POST['arch']);} else {echo 'No value provided: architecture.'; exit();}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);} else {echo 'No value provided: referer.'; exit();}
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_os WHERE os_id=$os_id");
        if (!$delete) {
          echo 'Delete Failed.';
          header("Refresh: $msg_display_time; URL=$ref");
        }
        else {
          echo 'Deleted ' . $os . ' ' . $os_ver . ' ' . $arch . ' from the database.' . '<br />';
          header("Refresh: $msg_display_time; URL=$ref");
        }
      }
    ?>
  </body>
</html>
