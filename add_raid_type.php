<html> 
  <body> 
    <?php 
      $config = parse_ini_file("./cmdocument.ini.php",false);
      $user = $config['user'];
      $pass = $config['pass'];
      $dbname = $config['dbname'];
      $host = $config['hostname'];
      $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $user . ' password=' . $pass) or die('Could not connect');
      $disk_raid_type = pg_escape_string($_POST['disk_raid_type']); 
      pg_query($db, "INSERT INTO cmd_disk_raid_type(disk_raid_type) VALUES('$disk_raid_type')"); 
      echo "The RAID type was added successfully with values: <br />" . "RAID Type: " . $disk_raid_type . "<br />"; 
    ?> 
  </body> 
</html> 
