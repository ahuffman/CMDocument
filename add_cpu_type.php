<html> 
  <body> 
    <?php 
      include './include/menu.php';
      if (isset($_POST['cpu_type_model'])) {$cpu_type_model = pg_escape_string($_POST['cpu_type_model']);} else {echo 'No value provided: cpu type model.'; exit();}
      if (isset($_POST['cpu_type_description'])) {$cpu_type_description = pg_escape_string($_POST['cpu_type_description']);} else {echo 'No value provided: cpu type description.'; exit();}
      if (isset($_POST['cpu_type_cores'])) {$cpu_type_cores = pg_escape_string($_POST['cpu_type_cores']);} else {echo 'No value provided: cpu type cores.'; exit();}
      if (isset($_POST['vend_id'])) {$vend_id = pg_escape_string($_POST['vend_id']);} else {echo 'No value provided: vendor id.'; exit();}
      $qry_cpu_type = pg_query($db, "INSERT INTO cmd_cpu_type(vend_id, cpu_type_model, cpu_type_description, cpu_type_cores) VALUES('$vend_id', '$cpu_type_model', '$cpu_type_description', '$cpu_type_cores')"); 
      if ($qry_cpu_type) {
        echo "The CPU Type was added successfully with values: <br />" . "CPU Model Number: " . $cpu_type_model . "<br />" . "CPU Name: " . $cpu_type_description . "<br />" . "CPU Cores: " .  $cpu_type_cores . "<br />" . "CPU Vendor: " . $vend_id . "<br />"; 
      }
      else {
        echo 'The CPU Type was not added successfully.' . '<br />' . "\r\n";
      }
    ?> 
  </body> 
</html> 
