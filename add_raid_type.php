<html> 
    <body> 
        <?php 
        $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');

        $raidtype = pg_escape_string($_POST['raidtype']); 
        pg_query($db, "INSERT INTO cmd_disk_raid_type(disk_raid_type) VALUES('$raidtype')"); 
	echo "The RAID type was added successfully with values: <br />" . "RAID Type: " . $raidtype . "<br />"; 
        pg_close(); 
        ?> 
    </body> 
</html> 
