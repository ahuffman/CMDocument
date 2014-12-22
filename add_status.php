<html> 
  <body> 
    <?php 
      $config = parse_ini_file("./cmdocument.ini.php",false);
      $user = $config['user'];
      $pass = $config['pass'];
      $dbname = $config['dbname'];
      $host = $config['hostname'];
      $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $user . ' password=' . $pass) or die('Could not connect');
      $status = pg_escape_string($_POST['status']); 
      pg_query($db, "INSERT INTO cmd_status(status) VALUES('$status')"); 
      echo "The Status was added successfully with values: <br />" . "Status: " . $status . "<br />";
    ?> 
  </body> 
</html> 
