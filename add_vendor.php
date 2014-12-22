<html> 
  <body> 
    <?php 
      $config = parse_ini_file("./cmdocument.ini.php",false);
      $user = $config['user'];
      $pass = $config['pass'];
      $dbname = $config['dbname'];
      $host = $config['hostname'];
      $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $user . ' password=' . $pass) or die('Could not connect');
      $vend = pg_escape_string($_POST['vend']); 
      pg_query($db, "INSERT INTO cmd_vendors(vend) VALUES('$vend')"); 
      echo "The Vendor was added successfully with values: <br />" . "Vendor Name: " . $vend . "<br />"; 
    ?> 
  </body> 
</html> 
