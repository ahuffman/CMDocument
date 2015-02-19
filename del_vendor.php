<html>
  <body>
    <?php
      include './include/menu.php';
      if (isset($_POST['vend_id'])) {$vend_id = pg_escape_string($_POST['vend_id']);} else {echo 'No value provided: vendor id.'; exit();}
      if (isset($_POST['vend'])) {$vend = pg_escape_string($_POST['vend']);} else {echo 'No value provided: vendor.'; exit();}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);} else {echo 'No value provided: referer.'; exit();}
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_vendors WHERE vend_id=$vend_id");
        if (!$delete) {
          echo '<div class="message">' . "\r\n" . 'Delete Failed.' . "\r\n" . '</div>' . "\r\n";
          header("Refresh: $msg_display_time; URL=$ref");
        }
        else {
          echo '<div class="message">' . "\r\n" . 'Deleted ' . $vend . ' from the database.' . "\r\n" . '</div>' . "\r\n";
          header("Refresh: $msg_display_time; URL=$ref");
        }
      }
    ?>
  </body>
</html>
