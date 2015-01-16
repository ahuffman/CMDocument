<html> 
  <body> 
    <?php 
      if (isset($_POST['obj_type'])) {$obj_type = pg_escape_string($_POST['obj_type']);} else {echo 'No value provided: object type.'; exit();}
      if (isset($_POST['obj_type_desc'])) {$obj_type_desc = pg_escape_string($_POST['obj_type_desc']);} else {echo 'No value provided: object type description.'; exit();}
      $qry_obj_type = pg_query($db, "INSERT INTO cmd_object_type(obj_type, obj_type_desc) VALUES('$obj_type', '$obj_type_desc')"); 
      if ($qry_obj_type) {
        echo "The object type was added successfully with values: <br />" . "Object Type: " . $obj_type . "<br />" . "Object Type Description: " . $obj_type_desc . "<br />"; 
      }
      else {
        echo 'The object type was not added successfully.' . '<br />' . "\r\n";
      }
    ?> 
  </body> 
</html> 
