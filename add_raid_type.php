<html> 
  <body> 
    <?php 
      include './include/menu.php';
      if (isset($_POST['disk_raid_type'])) {$disk_raid_type = pg_escape_string($_POST['disk_raid_type']);}  else {echo 'No value provided: disk raid type.'; exit();}
      $qry_raid_type = pg_query($db, "INSERT INTO cmd_disk_raid_type(disk_raid_type) VALUES('$disk_raid_type')"); 
      if ($qry_raid_type) {
        echo "The RAID type was added successfully with values: <br />" . "RAID Type: " . $disk_raid_type . "<br />"; 
      }
      else {
        echo 'The RAID type was not added successfully.' . '<br />' . "\r\n";
      }
    ?> 
  </body> 
</html> 
