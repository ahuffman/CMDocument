<html> 
    <body> 
        <?php 
        $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');

        $locname = pg_escape_string($_POST['locationname']);
        $locaddr = pg_escape_string($_POST['locationaddress']); 
        pg_query($db, "INSERT INTO cmd_locations(location_name, location_address) VALUES('$locname', '$locaddr')"); 
	echo "The Location was added successfully with values: <br />" . "Location Name: " . $locname . "<br />" . "Location Address: " . $locaddr . "<br />";
        pg_close(); 
        ?> 
    </body> 
</html> 
