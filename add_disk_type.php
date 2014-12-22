<html> 
  <body> 
    <?php 
      $config = parse_ini_file("./cmdocument.ini.php",false);
      $user = $config['user'];
      $pass = $config['pass'];
      $dbname = $config['dbname'];
      $host = $config['hostname'];
      $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $user . ' password=' . $pass) or die('Could not connect');
      $disk_type = pg_escape_string($_POST['disktype']); 
      $disk_type_desc = pg_escape_string($_POST['disktypedesc']); 
      pg_query($db, "INSERT INTO cmd_disk_type(disk_type, disk_type_desc) VALUES('$disk_type', '$disk_type_desc')"); 
      echo "The object type was added successfully with values: <br />" . "Disk Type: " . $disk_type . "<br />" . "Disk Type Description: " . $disk_type_desc . "<br />"; 
    ?> 
  </body> 
</html> 
