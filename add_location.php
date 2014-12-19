<html> 
  <body> 
    <?php 
      $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
      $location_name = pg_escape_string($_POST['location_name']);
      $location_address = pg_escape_string($_POST['location_address']); 
      pg_query($db, "INSERT INTO cmd_locations(location_name, location_address) VALUES('$location_name', '$location_address')"); 
      echo "The Location was added successfully with values: <br />" . "Location Name: " . $location_name . "<br />" . "Location Address: " . $location_address . "<br />";
    ?> 
  </body> 
</html> 
