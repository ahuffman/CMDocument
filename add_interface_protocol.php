<html> 
  <body> 
    <?php 
      $config = parse_ini_file("./cmdocument.ini.php",false);
      $user = $config['user'];
      $pass = $config['pass'];
      $dbname = $config['dbname'];
      $host = $config['hostname'];
      $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $user . ' password=' . $pass) or die('Could not connect');
      $int_proto = pg_escape_string($_POST['int_proto']); 
      pg_query($db, "INSERT INTO cmd_interface_protocol(int_proto) VALUES('$int_proto')"); 
      echo "The Interface Protocol was added successfully with values: <br />" . "Interface Protocol: " . $int_proto . "<br />";
    ?> 
  </body> 
</html> 
