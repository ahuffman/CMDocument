<html> 
  <body> 
    <?php 
      $config = parse_ini_file("./cmdocument.ini.php",false);
      $user = $config['user'];
      $pass = $config['pass'];
      $dbname = $config['dbname'];
      $host = $config['hostname'];
      $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $user . ' password=' . $pass) or die('Could not connect');
      $priority = pg_escape_string($_POST['priority']); 
      pg_query($db, "INSERT INTO cmd_priority(priority) VALUES('$priority')"); 
      echo "The Priority was added successfully with values: <br />" . "Priority: " . $priority . "<br />";
    ?> 
    </body> 
</html> 
