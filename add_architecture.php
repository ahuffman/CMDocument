<html> 
  <body> 
    <?php
      $config = parse_ini_file("./cmdocument.ini.php",false);
      $user = $config['user'];
      $pass = $config['pass'];
      $dbname = $config['dbname'];
      $host = $config['hostname'];
      $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $user . ' password=' . $pass) or die('Could not connect');
      $arch = pg_escape_string($_POST['arch']); 
      pg_query($db, "INSERT INTO cmd_architecture(arch) VALUES('$arch')"); 
      echo "The Architecture was added successfully with values: <br />" . "Architecture: " . $arch . "<br />";
    ?> 
  </body> 
</html> 
