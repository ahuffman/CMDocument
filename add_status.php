<html> 
  <body> 
    <?php 
      include './include/menu.php';
      if(isset($_POST)){$status = pg_escape_string($_POST['status']);}
      $qry_status = pg_query($db, "INSERT INTO cmd_status(status) VALUES('$status')"); 
      if ($qry_status) {
        echo "The Status was added successfully with values: <br />" . "Status: " . $status . "<br />";
      }
      else {
        echo 'The Status was not created.' . '<br />' . "\r\n";
      }
    ?> 
  </body> 
</html> 
