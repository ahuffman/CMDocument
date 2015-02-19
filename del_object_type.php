<html>
  <body>
    <?php
      include './include/menu.php';
      if (isset($_POST['obj_type_id'])) {$obj_type_id = pg_escape_string($_POST['obj_type_id']);} else {echo 'No value provided: object type id.'; exit();}
      if (isset($_POST['obj_type'])) {$obj_type = pg_escape_string($_POST['obj_type']);} else {echo 'No value provided: object type.'; exit();}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);} else {echo 'No value provided: referer.'; exit();}
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_object_type WHERE obj_type_id=$obj_type_id");
        if (!$delete) {
          echo '<div class="message">' . "\r\n" . 'Delete Failed.' . "\r\n" . '</div>' . "\r\n";
          header("Refresh: $msg_display_time; URL=$ref");
        }
        else {
          echo '<div class="message">' . "\r\n" . 'Deleted ' . $obj_type . ' from the database.' . "\r\n" . '</div>' . "\r\n";
          header("Refresh: $msg_display_time; URL=$ref");
        }
      }
    ?>
  </body>
</html>
