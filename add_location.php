<html> 
  <body> 
    <?php 
      $config = parse_ini_file("./cmdocument.ini.php",false);
      $user = $config['user'];
      $pass = $config['pass'];
      $dbname = $config['dbname'];
      $host = $config['hostname'];
      $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $user . ' password=' . $pass) or die('Could not connect');
      $location_name = pg_escape_string($_POST['location_name']);
      $location_address = pg_escape_string($_POST['location_address']); 
      pg_query($db, "INSERT INTO cmd_locations(location_name, location_address) VALUES('$location_name', '$location_address')"); 
      echo "The Location was added successfully with values: <br />" . "Location Name: " . $location_name . "<br />" . "Location Address: " . $location_address . "<br />";
    ?> 
  </body> 
</html> 
