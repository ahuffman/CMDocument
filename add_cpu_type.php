<html> 
  <body> 
    <?php 
      $config = parse_ini_file("./cmdocument.ini.php",false);
      $user = $config['user'];
      $pass = $config['pass'];
      $dbname = $config['dbname'];
      $host = $config['hostname'];
      $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $user . ' password=' . $pass) or die('Could not connect');
      $cpu_type_model = pg_escape_string($_POST['cpu_type_model']); 
      $cpu_type_description = pg_escape_string($_POST['cpu_type_description']); 
      $cpu_type_cores = pg_escape_string($_POST['cpu_type_cores']);
      $vend_id = pg_escape_string($_POST['vend_id']);
      pg_query($db, "INSERT INTO cmd_cpu_type(vend_id, cpu_type_model, cpu_type_description, cpu_type_cores) VALUES('$vend_id', '$cpu_type_model', '$cpu_type_description', '$cpu_type_cores')"); 
      echo "The CPU Type was added successfully with values: <br />" . "CPU Model Number: " . $cpu_type_model . "<br />" . "CPU Name: " . $cpu_type_description . "<br />" . "CPU Cores: " .  $cpu_type_cores . "<br />" . "CPU Vendor: " . $vend_id . "<br />"; 
    ?> 
  </body> 
</html> 
