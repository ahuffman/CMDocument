<html> 
    <body> 
        <?php 
        $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');

        $purpose = pg_escape_string($_POST['purpose']); 
        pg_query($db, "INSERT INTO cmd_purpose(purpose) VALUES('$purpose')"); 
	echo "The Purpose was added successfully with values: <br />" . "Purpose: " . $purpose . "<br />";
        pg_close(); 
        ?> 
    </body> 
</html> 
