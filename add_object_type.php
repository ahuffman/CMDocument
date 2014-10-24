<html> 
    <body> 
        <?php 
        $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');

        $objecttype = pg_escape_string($_POST['objecttype']); 
        $objecttypedesc = pg_escape_string($_POST['objecttypedesc']); 
        pg_query($db, "INSERT INTO cmd_object_type(obj_type, obj_type_desc) VALUES('$objecttype', '$objecttypedesc')"); 
	echo "The object type was added successfully with values: <br />" . "Object Type: " . $objecttype . "<br />" . "Object Type Description: " . $objecttypedesc . "<br />"; 
        pg_close(); 
        ?> 
    </body> 
</html> 
