<html> 
  <body> 
    <?php 
      $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
      $vend = pg_escape_string($_POST['vend']); 
      pg_query($db, "INSERT INTO cmd_vendors(vend) VALUES('$vend')"); 
      echo "The Vendor was added successfully with values: <br />" . "Vendor Name: " . $vend . "<br />"; 
    ?> 
  </body> 
</html> 
