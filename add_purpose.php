<html> 
  <body> 
    <?php 
      $config = parse_ini_file("./cmdocument.ini.php",false);
      $user = $config['user'];
      $pass = $config['pass'];
      $dbname = $config['dbname'];
      $host = $config['hostname'];
      $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $user . ' password=' . $pass) or die('Could not connect');
      $purpose = pg_escape_string($_POST['purpose']); 
      pg_query($db, "INSERT INTO cmd_purpose(purpose) VALUES('$purpose')"); 
      echo "The Purpose was added successfully with values: <br />" . "Purpose: " . $purpose . "<br />";
    ?> 
  </body> 
</html> 
