<html>
  <body>
    <?php
      include './include/menu.php';
      if (isset($_POST['model_id'])) {$model_id = pg_escape_string($_POST['model_id']);} else {echo 'No value provided: model id.'; exit();}
      if (isset($_POST['model'])) {$model = pg_escape_string($_POST['model']);} else {echo 'No value provided: model.'; exit();}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);} else {echo 'No value provided: referer.'; exit();}
      if (isset($_POST['vend'])) {$vend = pg_escape_string($_POST['vend']);}
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_model WHERE model_id=$model_id");
        if (!$delete) {
          echo '<div class="message>' . "\r\n" . 'Delete Failed.' . "\r\n" . '</div>' . "\r\n";
          header("Refresh: $msg_display_time; URL=$ref");
        }
        else {
          echo '<div class="message>' . "\r\n" . 'Deleted ' . $vend . ' ' . $model . ' from the database.' . "\r\n" . '</div>' . "\r\n";
          header("Refresh: $msg_display_time; URL=$ref");
        }
      }
    ?>
  </body>
</html>
