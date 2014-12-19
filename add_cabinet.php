<html> 
  <body> 
    <?php 
      $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
      $cab_name = pg_escape_string($_POST['cab_name']); 
      $cab_units_tot = pg_escape_string($_POST['cab_units_tot']); 
      $location_id = pg_escape_string($_POST['location_id']);
      pg_query($db, "INSERT INTO cmd_cabinets(location_id, cab_name, cab_units_tot) VALUES('$location_id', '$cab_name', '$cab_units_tot')"); 
      echo "The Cabinet was added successfully with values: <br />" . "Cabinet Name: " . $cab_name . "<br />" . "Cabinet Total Rack Units: " . $cab_units_tot . "<br />" . "Cabinet Location ID: " .  $location_id . "<br />"; 
    ?> 
  </body> 
</html> 
