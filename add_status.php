<html> 
    <body> 
        <?php 
        $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');

        $status = pg_escape_string($_POST['status']); 
        pg_query($db, "INSERT INTO cmd_status(status) VALUES('$status')"); 
	echo "The Status was added successfully with values: <br />" . "Status: " . $status . "<br />";
        pg_close(); 
        ?> 
    </body> 
</html> 
