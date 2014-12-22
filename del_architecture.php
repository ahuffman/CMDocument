<html>
  <?php
    $config = parse_ini_file("./cmdocument.ini.php",false);
    $user = $config['user'];
    $pass = $config['pass'];
    $dbname = $config['dbname'];
    $host = $config['hostname'];
    $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $user . ' password=' . $pass) or die('Could not connect');
    if (isset($_POST['arch_id'])) {$arch_id = pg_escape_string($_POST['arch_id']);}
    if (isset($_POST['arch'])) {$arch = pg_escape_string($_POST['arch']);}
    if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);}
    echo '  <head>' . '<META HTTP-EQUIV=Refresh CONTENT="3;URL=' . $ref . '">' . '</head>' . '<body>';
    if (isset($ref)) {
      $delete = pg_query($db, "DELETE FROM cmd_architecture WHERE arch_id=$arch_id");
      if (!$delete) {
        echo 'Delete Failed.';
      }
      else {
        echo 'Deleted ' . $arch . ' from the database.' . '<br />';
      }
    }
  ?>
  </body>
</html>
