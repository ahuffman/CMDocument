<html>
  <body>
    <?php
      include './include/menu.php';
      if (isset($_POST['int_proto_id'])) {$int_proto_id = pg_escape_string($_POST['int_proto_id']);} else {echo 'No value provided: interface protocol id.'; exit();}
      if (isset($_POST['int_proto'])) {$int_proto = pg_escape_string($_POST['int_proto']);} else {echo 'No value provided: interface protocol.'; exit();}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);} else {echo 'No value provided: referer.'; exit();}
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_interface_protocol WHERE int_proto_id=$int_proto_id");
        if (!$delete) {
          echo '<div class="message>' . "\r\n" . 'Delete Failed.' . "\r\n" . '</div>' . "\r\n";
          header("Refresh: $msg_display_time; URL=$ref");
        }
        else {
          echo '<div class="message>' . "\r\n" . 'Deleted ' . $int_proto . ' from the database.' . "\r\n" . '</div>' . "\r\n";
          header("Refresh: $msg_display_time; URL=$ref");
        }
      }
    ?>
  </body>
</html>
