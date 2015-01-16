<html> 
  <body> 
    <?php
      include './include/menu.php';
      if (isset($_POST['arch'])) {$arch = pg_escape_string($_POST['arch']);}  else {echo 'No value provided: architecture.'; exit();}
      $qry_arch = pg_query($db, "INSERT INTO cmd_architecture(arch) VALUES('$arch')"); 
      if ($qry_arch) {
        echo 'The Architecture was added successfully with values: <br />' . 'Architecture: ' . $arch . '<br />' . "\r\n";
      }
      else {
        echo 'The Architecture was not added successfully.' . '<br />' . "\r\n";
      }
    ?> 
  </body> 
</html> 
