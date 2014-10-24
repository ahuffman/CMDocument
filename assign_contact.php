<html> 
    <body> 
        <?php 
        $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
        $object = pg_escape_string($_POST['object']); 
        $contact = pg_escape_string($_POST['contact']); 
        pg_query($db, "INSERT INTO cmd_contact_assigned(contact_id, obj_id) VALUES('$contact', '$object')"); 
	echo "The Contact was assigned successfully with values: <br />" . "Contact ID: " . $contact . "<br />" . "Object ID: " . $object . "<br />"; 
        pg_close(); 
        ?> 
    </body> 
</html> 
