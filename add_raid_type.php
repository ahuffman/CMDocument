<html> 
  <body> 
    <?php 
      $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
      $disk_raid_type = pg_escape_string($_POST['disk_raid_type']); 
      pg_query($db, "INSERT INTO cmd_disk_raid_type(disk_raid_type) VALUES('$disk_raid_type')"); 
      echo "The RAID type was added successfully with values: <br />" . "RAID Type: " . $disk_raid_type . "<br />"; 
    ?> 
  </body> 
</html> 
