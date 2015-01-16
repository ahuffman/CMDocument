<html> 
  <body> 
    <?php 
      include './include/menu.php';
      if (isset($_POST['os'])) {$os = pg_escape_string($_POST['os']);} else {echo 'No value provided: operating system.'; exit();}
      if (isset($_POST['os_ver'])) {$os_ver = pg_escape_string($_POST['os_ver']);} else {echo 'No value provided: operating system version.'; exit();}
      if (isset($_POST['arch_id'])) {$arch_id = pg_escape_string($_POST['arch_id']);} else {echo 'No value provided: architecture id.'; exit();}
      $qry_os = pg_query($db, "INSERT INTO cmd_os(os,os_ver,arch_id) VALUES('$os', '$os_ver', '$arch_id')"); 
      if ($qry_os) {
        echo 'The Operating System was added successfully with values: <br />' . 'Operating System Name: ' . $os . '<br />' . 'Operating System Version: ' . $os_ver . '<br />' . 'Operating System Architecture: ' . $arch_id . '<br />'; 
      }
      else {
        echo 'The Operating Syste was not added successfully.' . '<br />' . "\r\n";
      }
    ?> 
  </body> 
</html> 
