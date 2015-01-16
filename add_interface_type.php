<html> 
  <body> 
    <?php
      include './include/menu.php';
      if (isset($_POST['int_type'])) {$int_type = pg_escape_string($_POST['int_type']);} else {echo 'No value provided: interface type.'; exit();}
      if (isset($_POST['int_type_desc'])) {$int_type_desc = pg_escape_string($_POST['int_type_desc']);} else {echo 'No value provided: interface type description.'; exit();}
      $qry_int_type = pg_query($db, "INSERT INTO cmd_interface_type(int_type, int_type_desc) VALUES('$int_type', '$int_type_desc')"); 
      if ($qry_int_type) {
        echo "The interface type was added successfully with values: <br />" . "Interface Type: " . $int_type . "<br />" . "Interface Type Description: " . $int_type_desc . "<br />"; 
      }
      else {
        echo 'The interface type was not added successfully.' . '<br />' . "\r\n";
      }
    ?> 
  </body> 
</html> 
