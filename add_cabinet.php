<html> 
  <body> 
    <?php 
      include './include/menu.php';
      if (isset($_POST['cab_name'])) {$cab_name = pg_escape_string($_POST['cab_name']);} else {echo 'No value provided: cabinet name.'; exit();}
      if (isset($_POST['cab_units_tot'])) {$cab_units_tot = pg_escape_string($_POST['cab_units_tot']);} else {echo 'No value provided: total cabinet units.'; exit();}
      if (isset($_POST['location_id'])) {$location_id = pg_escape_string($_POST['location_id']);} else {echo 'No value provided: location id.'; exit();}
      $qry_cab = pg_query($db, "INSERT INTO cmd_cabinets(location_id, cab_name, cab_units_tot) VALUES('$location_id', '$cab_name', '$cab_units_tot')"); 
      if ($qry_cab) {
        echo "The Cabinet was added successfully with values: <br />" . "Cabinet Name: " . $cab_name . "<br />" . "Cabinet Total Rack Units: " . $cab_units_tot . "<br />" . "Cabinet Location ID: " .  $location_id . "<br />"; 
      }
      else {
        echo 'The Cabinet was not added successfully.' . '<br />' . "\r\n";
      }
    ?> 
  </body> 
</html> 
