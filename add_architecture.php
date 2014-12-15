<html> 
  <body> 
    <?php 
      $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
      $arch = pg_escape_string($_POST['arch']); 
      pg_query($db, "INSERT INTO cmd_architecture(arch) VALUES('$arch')"); 
      echo "The Architecture was added successfully with values: <br />" . "Architecture: " . $arch . "<br />";
    ?> 
  </body> 
</html> 
