<html> 
  <body> 
    <?php 
      include './include/menu.php';
      if (isset($_POST['model'])) {$model = pg_escape_string($_POST['model']);} else {echo 'No value provided: object model.'; exit();}
      if (isset($_POST['vend_id'])) {$vend_id = pg_escape_string($_POST['vend_id']); else {echo 'No value provided: vendor id.'; exit();}
      $obj_type_id = pg_escape_string($_POST['obj_type_id']);        
      $qry_model = pg_query($db, "INSERT INTO cmd_model(model, vend_id, obj_type_id) VALUES('$model', '$vend_id', '$obj_type_id')"); 
      if ($qry_model) {
        echo "The Model was added successfully with values: <br />" . "Model: " . $model . "<br />" . "Vendor ID: " . $vend_id . "<br />" . "Model Type: " . $obj_type_id . "<br />";
      }
      else {
        echo 'The Model was not added successfully.' . '<br />' . "\r\n";
      }
    ?> 
  </body> 
</html> 
