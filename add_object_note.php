<html> 
  <body> 
    <?php 
      $config = parse_ini_file("./cmdocument.ini.php",false);
      $user = $config['user'];
      $pass = $config['pass'];
      $dbname = $config['dbname'];
      $host = $config['hostname'];
      $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $user . ' password=' . $pass) or die('Could not connect');
      $object = pg_escape_string($_POST['object']); 
      $note = pg_escape_string($_POST['note']); 
      pg_query($db, "INSERT INTO cmd_object_notes(obj_id, obj_notes) VALUES('$object', '$note')"); 
      echo "The Object Note was added successfully with values: <br />" . "Object ID: " . $object . "<br />" . "Note: " . $note . "<br />"; 
    ?> 
  </body> 
</html> 
