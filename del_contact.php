<html>
    <?php
      $config = parse_ini_file("./cmdocument.ini.php",false);
      $user = $config['user'];
      $pass = $config['pass'];
      $dbname = $config['dbname'];
      $host = $config['hostname'];
      $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $user . ' password=' . $pass) or die('Could not connect');
      if (isset($_POST['contact_id'])) {$contact_id = pg_escape_string($_POST['contact_id']);}
      if (isset($_POST['contact_firstname'])) {$contact_firstname = pg_escape_string($_POST['contact_firstname']);}
      if (isset($_POST['contact_lastname'])) {$contact_lastname = pg_escape_string($_POST['contact_lastname']);}
      if (isset($_POST['contact_company'])) {$contact_company = pg_escape_string($_POST['contact_company']);}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);}
      echo '  <head>' . '<META HTTP-EQUIV=Refresh CONTENT="3;URL=' . $ref . '">' . '</head>' . '<body>';
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_contacts WHERE contact_id=$contact_id");
        if (!$delete) {
        echo 'Delete Failed.';
        }
        else {
        echo 'Deleted ' . $contact_company . ' - ' . $contact_lastname . ", " . $contact_firstname . ' from the database.' . '<br />';
        }
      }
    ?>
  </body>
</html>
