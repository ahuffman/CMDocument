<html> 
  <body> 
    <?php 
      include './include/menu.php';
      if (isset($_POST['disktype'])) {$disk_type = pg_escape_string($_POST['disktype']);} else {echo 'No value provided: disk type.'; exit();}
      if (isset($_POST['disktypedesc'])) {$disk_type_desc = pg_escape_string($_POST['disktypedesc']);} else {echo 'No value provided: disk type description.'; exit();}
      $qry_disktype = pg_query($db, "INSERT INTO cmd_disk_type(disk_type, disk_type_desc) VALUES('$disk_type', '$disk_type_desc')"); 
      if ($qry_disktype) {
        echo 'The disk type was added successfully with values: <br />' . 'Disk Type: ' . $disk_type . '<br />' . 'Disk Type Description: ' . $disk_type_desc . '<br />'; 
      }
      else {
        echo 'The disk type was not added successfully.' . '<br />' . "\r\n";
      }
    ?> 
  </body> 
</html> 
