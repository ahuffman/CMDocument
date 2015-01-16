<html> 
  <body> 
    <?php
      include './include/menu.php'; 
      if (isset($_POST['vend_id'])) {$vend_id = pg_escape_string($_POST['vend_id']);} else {echo 'No value provided: vendor id.'; exit();}
      if (isset($_POST['software'])) {$software = pg_escape_string($_POST['software']);} else {echo 'No value provided: software.'; exit();}
      if (isset($_POST['sw_ver'])) {$sw_ver = pg_escape_string($_POST['sw_ver']);} else {echo 'No value provided: software version.'; exit();}
      if (isset($_POST['arch_id'])) {$arch_id = pg_escape_string($_POST['arch_id']);} else {echo 'No value provided: architecture id.'; exit();}
      $qry_sw = pg_query($db, "INSERT INTO cmd_software(software,arch_id,sw_ver,vend_id) VALUES('$software', '$arch_id', '$sw_ver', '$vend_id')");
      if ($qry_sw) {
        echo 'The Software was added successfully with values: <br />' . 'Software Vendor: ' . $vend_id . '<br />' . 'Software Name: ' . $software . '<br />' . 'Software Version: ' . $sw_ver . '<br />' . 'Software Architecture: ' . $arch_id . '<br />';
      }
      else {
        echo 'The Software was not added successfully.' . '<br />' . "\r\n";
      }
    ?> 
  </body> 
</html> 
