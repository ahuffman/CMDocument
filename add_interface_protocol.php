<html> 
  <body> 
    <?php 
      include './include/menu.php';
      if (isset($_POST['int_proto'])) {$int_proto = pg_escape_string($_POST['int_proto']);} else {echo 'No value provided: interface protocol.'; exit();}
      $qry_int_proto = pg_query($db, "INSERT INTO cmd_interface_protocol(int_proto) VALUES('$int_proto')"); 
      if ($qry_int_proto) {
        echo "The Interface Protocol was added successfully with values: <br />" . "Interface Protocol: " . $int_proto . "<br />";
      }
      else {
        echo 'The Interface Protocol was not added successfully.' . '<br />' . "\r\n";
      }
    ?> 
  </body> 
</html> 
