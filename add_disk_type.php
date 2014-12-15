<html> 
    <body> 
        <?php 
        $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');

        $disk_type = pg_escape_string($_POST['disktype']); 
        $disk_type_desc = pg_escape_string($_POST['disktypedesc']); 
        pg_query($db, "INSERT INTO cmd_disk_type(disk_type, disk_type_desc) VALUES('$disk_type', '$disk_type_desc')"); 
	echo "The object type was added successfully with values: <br />" . "Disk Type: " . $disk_type . "<br />" . "Disk Type Description: " . $disk_type_desc . "<br />"; 
        pg_close(); 
        ?> 
    </body> 
</html> 
