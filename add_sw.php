<html> 
  <body> 
    <?php 
      $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
      $vend_id = pg_escape_string($_POST['vend_id']);
      $software = pg_escape_string($_POST['software']); 
      $sw_ver = pg_escape_string($_POST['sw_ver']);
      $arch_id = pg_escape_string($_POST['arch_id']);
      pg_query($db, "INSERT INTO cmd_software(software,arch_id,sw_ver,vend_id) VALUES('$software', '$arch_id', '$sw_ver', '$vend_id')"); 
      echo 'The Software was added successfully with values: <br />' . 'Software Vendor: ' . $vend_id . '<br />' . 'Software Name: ' . $software . '<br />' . 'Software Version: ' . $sw_ver . '<br />' . 'Software Architecture: ' . $arch_id . '<br />';
    ?> 
  </body> 
</html> 
