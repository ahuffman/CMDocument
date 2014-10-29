<html> 
    <body> 
        <?php 
        $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');

        $priority = pg_escape_string($_POST['priority']); 
        pg_query($db, "INSERT INTO cmd_priority(priority) VALUES('$priority')"); 
	echo "The Priority was added successfully with values: <br />" . "Priority: " . $priority . "<br />";
        pg_close(); 
        ?> 
    </body> 
</html> 
