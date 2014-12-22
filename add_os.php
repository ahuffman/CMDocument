<html> 
  <body> 
    <?php 
      $config = parse_ini_file("./cmdocument.ini.php",false);
      $user = $config['user'];
      $pass = $config['pass'];
      $dbname = $config['dbname'];
      $host = $config['hostname'];
      $db = pg_connect('host=' . $host . ' dbname=' . $dbname . ' user=' . $user . ' password=' . $pass) or die('Could not connect');
      $os = pg_escape_string($_POST['os']); 
      $os_ver = pg_escape_string($_POST['os_ver']);
      $arch_id = pg_escape_string($_POST['arch_id']);
      pg_query($db, "INSERT INTO cmd_os(os,os_ver,arch_id) VALUES('$os', '$os_ver', '$arch_id')"); 
      echo 'The Operating System was added successfully with values: <br />' . 'Operating System Name: ' . $os . '<br />' . 'Operating System Version: ' . $os_ver . '<br />' . 'Operating System Architecture: ' . $arch_id . '<br />'; 
    ?> 
  </body> 
</html> 
