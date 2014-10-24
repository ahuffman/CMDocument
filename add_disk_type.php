<html> 
    <body> 
        <?php 
        $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');

        $disktype = pg_escape_string($_POST['disktype']); 
        $disktypedesc = pg_escape_string($_POST['disktypedesc']); 
        pg_query($db, "INSERT INTO cmd_disk_type(disk_type, disk_type_desc) VALUES('$disktype', '$disktypedesc')"); 
	echo "The object type was added successfully with values: <br />" . "Disk Type: " . $disktype . "<br />" . "Disk Type Description: " . $disktypedesc . "<br />"; 
        pg_close(); 
        ?> 
    </body> 
</html> 
