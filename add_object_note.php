<html> 
    <body> 
        <?php 
        $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
        $object = pg_escape_string($_POST['object']); 
        $note = pg_escape_string($_POST['note']); 
        pg_query($db, "INSERT INTO cmd_object_notes(obj_id, obj_notes) VALUES('$object', '$note')"); 
	echo "The Object Note was added successfully with values: <br />" . "Object ID: " . $object . "<br />" . "Note: " . $note . "<br />"; 
        pg_close(); 
        ?> 
    </body> 
</html> 
