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
      $contact = pg_escape_string($_POST['contact']); 
      pg_query($db, "INSERT INTO cmd_contact_assigned(contact_id, obj_id) VALUES('$contact', '$object')"); 
      echo "The Contact was assigned successfully with values: <br />" . "Contact ID: " . $contact . "<br />" . "Object ID: " . $object . "<br />"; 
      pg_close(); 
    ?> 
  </body> 
</html> 
