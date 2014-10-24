<html> 
    <body> 
        <?php 
        $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
        $cabname = pg_escape_string($_POST['cabname']); 
        $cabrus = pg_escape_string($_POST['cabrus']); 
        $location = pg_escape_string($_POST['location']);
        pg_query($db, "INSERT INTO cmd_cabinets(location_id, cab_name, cab_units_tot) VALUES('$location', '$cabname', '$cabrus')"); 
	echo "The Cabinet was added successfully with values: <br />" . "Cabinet Name: " . $cabname . "<br />" . "Cabinet Total Rack Units: " . $cabrus . "<br />" . "Cabinet Location ID: " .  $location . "<br />"; 
        pg_close(); 
        ?> 
    </body> 
</html> 
