<html> 
  <body> 
    <?php 
      include './include/menu.php';
      if (isset($_POST['purpose'])) {$purpose = pg_escape_string($_POST['purpose']);}
      $qry_purpose = pg_query($db, "INSERT INTO cmd_purpose(purpose) VALUES('$purpose')");
      if ($qry_purpose) {
        echo "The Purpose was added successfully with values: <br />" . "Purpose: " . $purpose . "<br />";
      }
      else {
        echo 'The Purpose was not added successfully.' . '<br />' . "\r\n";
      }
    ?> 
  </body> 
</html> 
