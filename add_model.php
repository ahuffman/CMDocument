<html> 
  <body> 
    <?php 
      $config = parse_ini_file("./cmdocument.ini.php",false);
      $user = $config['user'];
      $pass = $config['pass'];
      $dbname = $config['dbname'];
      $host = $config['hostname'];
      $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $user . ' password=' . $pass) or die('Could not connect');
      $model = pg_escape_string($_POST['model']);
      $vend_id = pg_escape_string($_POST['vend_id']);
      $obj_type_id = pg_escape_string($_POST['obj_type_id']);        
      pg_query($db, "INSERT INTO cmd_model(model, vend_id, obj_type_id) VALUES('$model', '$vend_id', '$obj_type_id')"); 
      echo "The Model was added successfully with values: <br />" . "Model: " . $model . "<br />" . "Vendor ID: " . $vend_id . "<br />" . "Model Type: " . $obj_type_id . "<br />";
    ?> 
  </body> 
</html> 
