<html> 
  <body> 
    <?php 
      $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
      $int_proto = pg_escape_string($_POST['int_proto']); 
      pg_query($db, "INSERT INTO cmd_interface_protocol(int_proto) VALUES('$int_proto')"); 
      echo "The Interface Protocol was added successfully with values: <br />" . "Interface Protocol: " . $int_proto . "<br />";
    ?> 
  </body> 
</html> 
