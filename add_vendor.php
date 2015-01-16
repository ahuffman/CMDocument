<html> 
  <body> 
    <?php 
      include './include/menu.php';
      if (isset($_POST['vend'])) {$vend = pg_escape_string($_POST['vend']);} else {echo 'No value provided: vendor.'; exit();}
      $qry_vend = pg_query($db, "INSERT INTO cmd_vendors(vend) VALUES('$vend')"); 
      if ($qry_vend) {
        echo "The Vendor was added successfully with values: <br />" . "Vendor Name: " . $vend . "<br />"; 
      }
      else {
        echo 'The Vendor was not added successfully.' . '<br />' . "\r\n";
      }
    ?> 
  </body> 
</html> 
