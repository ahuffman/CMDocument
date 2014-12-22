<html> 
  <body> 
    <?php 
      $config = parse_ini_file("./cmdocument.ini.php",false);
      $user = $config['user'];
      $pass = $config['pass'];
      $dbname = $config['dbname'];
      $host = $config['hostname'];
      $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $user . ' password=' . $pass) or die('Could not connect');
      $int_type = pg_escape_string($_POST['int_type']); 
      $int_type_desc = pg_escape_string($_POST['int_type_desc']); 
      pg_query($db, "INSERT INTO cmd_interface_type(int_type, int_type_desc) VALUES('$int_type', '$int_type_desc')"); 
      echo "The interface type was added successfully with values: <br />" . "Interface Type: " . $int_type . "<br />" . "Interface Type Description: " . $int_type_desc . "<br />"; 
    ?> 
  </body> 
</html> 
