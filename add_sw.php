<html> 
  <body> 
    <?php 
      $config = parse_ini_file("./cmdocument.ini.php",false);
      $user = $config['user'];
      $pass = $config['pass'];
      $dbname = $config['dbname'];
      $host = $config['hostname'];
      $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $user . ' password=' . $pass) or die('Could not connect');
      $vend_id = pg_escape_string($_POST['vend_id']);
      $software = pg_escape_string($_POST['software']); 
      $sw_ver = pg_escape_string($_POST['sw_ver']);
      $arch_id = pg_escape_string($_POST['arch_id']);
      pg_query($db, "INSERT INTO cmd_software(software,arch_id,sw_ver,vend_id) VALUES('$software', '$arch_id', '$sw_ver', '$vend_id')"); 
      echo 'The Software was added successfully with values: <br />' . 'Software Vendor: ' . $vend_id . '<br />' . 'Software Name: ' . $software . '<br />' . 'Software Version: ' . $sw_ver . '<br />' . 'Software Architecture: ' . $arch_id . '<br />';
    ?> 
  </body> 
</html> 
