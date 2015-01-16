<html>
  <body>
    <?php
      include './include/menu.php';
      if (isset($_POST['purpose_id'])) {$purpose_id = pg_escape_string($_POST['purpose_id']);} else {echo 'No value provided: purpose id.'; exit();}
      if (isset($_POST['purpose'])) {$purpose = pg_escape_string($_POST['purpose']);} else {echo 'No value provided: purpose.'; exit();}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);} else {echo 'No value provided: referer.'; exit();}
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_purpose WHERE purpose_id=$purpose_id");
        if (!$delete) {
          echo 'Delete Failed.';
          header("Refresh: $msg_display_time; URL=$ref");
        }
        else {
          echo 'Deleted ' . $purpose . ' from the database.' . '<br />';
          header("Refresh: $msg_display_time; URL=$ref");
        }
      }
    ?>
  </body>
</html>
