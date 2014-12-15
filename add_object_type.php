<html> 
  <body> 
    <?php 
      $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
      $obj_type = pg_escape_string($_POST['obj_type']); 
      $obj_type_desc = pg_escape_string($_POST['obj_type_desc']); 
      pg_query($db, "INSERT INTO cmd_object_type(obj_type, obj_type_desc) VALUES('$obj_type', '$obj_type_desc')"); 
      echo "The object type was added successfully with values: <br />" . "Object Type: " . $obj_type . "<br />" . "Object Type Description: " . $obj_type_desc . "<br />"; 
    ?> 
  </body> 
</html> 
