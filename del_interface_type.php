<html>
  <body>
    <?php
      include './include/menu.php';
      if (isset($_POST['int_type_id'])) {$int_type_id = pg_escape_string($_POST['int_type_id']);} else {echo 'No value provided: interface type id.'; exit();}
      if (isset($_POST['int_type'])) {$int_type = pg_escape_string($_POST['int_type']);} else {echo 'No value provided: interface type.'; exit();}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);} else {echo 'No value provided: referer.'; exit();}
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_interface_type WHERE int_type_id=$int_type_id");
        if (!$delete) {
          echo '<div class="message>' . "\r\n" . 'Delete Failed.' . "\r\n" . '</div>' . "\r\n";
          header("Refresh: $msg_display_time; URL=$ref");
        }
        else {
          echo '<div class="message>' . "\r\n" . 'Deleted ' . $int_type . ' from the database.' . "\r\n" . '</div>' . "\r\n";
          header("Refresh: $msg_display_time; URL=$ref");
        }
      }
    ?>
  </body>
</html>
