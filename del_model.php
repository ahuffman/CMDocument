<html>
    <?php
      $config = parse_ini_file("./cmdocument.ini.php",false);
      $user = $config['user'];
      $pass = $config['pass'];
      $dbname = $config['dbname'];
      $host = $config['hostname'];
      $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $user . ' password=' . $pass) or die('Could not connect');
      if (isset($_POST['model_id'])) {$model_id = pg_escape_string($_POST['model_id']);}
      if (isset($_POST['model'])) {$model = pg_escape_string($_POST['model']);}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);}
      if (isset($_POST['vend'])) {$vend = pg_escape_string($_POST['vend']);}
      echo '  <head>' . '<META HTTP-EQUIV=Refresh CONTENT="3;URL=' . $ref . '">' . '</head>' . '<body>';
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_model WHERE model_id=$model_id");
        if (!$delete) {
        echo 'Delete Failed.';
        }
        else {
        echo 'Deleted ' . $vend . ' ' . $model . ' from the database.' . '<br />';
        }
      }
    ?>
  </body>
</html>
