<html> 
    <body> 
        <?php 
        $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');

        $vendor = pg_escape_string($_POST['vendor']); 
        pg_query($db, "INSERT INTO cmd_vendors(vend) VALUES('$vendor')"); 
	echo "The Vendor was added successfully with values: <br />" . "Vendor Name: " . $vendor . "<br />"; 
        pg_close(); 
        ?> 
    </body> 
</html> 
