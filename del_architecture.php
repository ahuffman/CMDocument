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
          echo '<div class="message">' . "\r\n" . 'Delete Failed.' . "\r\n" . '</div>' . "\r\n";
          header("Refresh: $msg_display_time; URL=$ref");
        }
        else {
          echo '<div class="message">' . "\r\n" . 'Deleted ' . $arch . ' from the database.' . "\r\n" . '</div>' . "\r\n";
          header("Refresh: $msg_display_time; URL=$ref");
        }
      }
    ?>
  </body>
</html>
