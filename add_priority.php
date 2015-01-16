<html> 
  <body> 
    <?php
      include './include/menu.php';
      if (isset($_POST['priority'])) {$priority = pg_escape_string($_POST['priority']);}} else {echo 'No value provided: priority.'; exit();}
      $qry_priority = pg_query($db, "INSERT INTO cmd_priority(priority) VALUES('$priority')"); 
      if ($qry_priority) {
        echo 'The Priority was added successfully with values: <br />' . 'Priority: ' . $priority . '<br />';
      }
      else {
        echo 'The Priority was not added successfully.' . '<br />' . "\r\n";
      }
    ?> 
  </body> 
</html> 
