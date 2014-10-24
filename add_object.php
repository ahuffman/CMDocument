<html> 
    <body> 
        <?php 
        $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');

        $objectname = pg_escape_string($_POST['objectname']); 
        $serial = pg_escape_string($_POST['serial']); 
        $installdate = pg_escape_string($_POST['installdate']);
	$decomissiondate = pg_escape_string($_POST['decomissiondate']);
	$ru_size = pg_escape_string($_POST['ru_size']);
        pg_query($db, "INSERT INTO cmd_object(obj_name, obj_serial, obj_install, obj_decom, obj_ru_size) VALUES('$objectname', '$serial', to_date('$installdate', 'YYYY-MM-DD'), to_date('$decomissiondate', 'YYYY-MM-DD'), '$ru_size')"); 
	echo "The object was added successfully with values: <br />" . "Object Name: " . $objectname . "<br />" . "Serial Number: " . $serial . "<br />" . "Installation Date: " .  $installdate . "<br />" . "Decomission Date: " . $decomissiondate . "<br />" . "Size in Rack Units: " .  $ru_size . "<br />"; 
        pg_close(); 
        ?> 
    </body> 
</html> 
