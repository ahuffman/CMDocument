<html> 
  <body> 
    <?php 
      include './include/menu.php';
      if (isset($_POST['location_name'])) {$location_name = pg_escape_string($_POST['location_name']);} else {echo 'No value provided: location name.'; exit();}
      if (isset($_POST['location_address'])) {$location_address = pg_escape_string($_POST['location_address']);} else {echo 'No value provided: location address.'; exit();}
      $qry_location = pg_query($db, "INSERT INTO cmd_locations(location_name, location_address) VALUES('$location_name', '$location_address')"); 
      if ($qry_location) {
        echo "The Location was added successfully with values: <br />" . "Location Name: " . $location_name . "<br />" . "Location Address: " . $location_address . "<br />";
      }
      else {
        echo 'The Location was not added successfully.' . '<br />' . "\r\n";
      }
    ?> 
  </body> 
</html> 
