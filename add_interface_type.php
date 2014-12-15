<html> 
    <body> 
        <?php 
        $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
        $int_type = pg_escape_string($_POST['int_type']); 
        $int_type_desc = pg_escape_string($_POST['int_type_desc']); 
        pg_query($db, "INSERT INTO cmd_interface_type(int_type, int_type_desc) VALUES('$int_type', '$int_type_desc')"); 
	echo "The interface type was added successfully with values: <br />" . "Interface Type: " . $int_type . "<br />" . "Interface Type Description: " . $int_type_desc . "<br />"; 
        pg_close(); 
        ?> 
    </body> 
</html> 
