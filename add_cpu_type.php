<html> 
    <body> 
        <?php 
        $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
        $cpumodel = pg_escape_string($_POST['cpumodel']); 
        $cputypedescription = pg_escape_string($_POST['cputypedescription']); 
        $cpucores = pg_escape_string($_POST['cpucores']);
	$cpuvendor = pg_escape_string($_POST['cpuvendor']);
        pg_query($db, "INSERT INTO cmd_cpu_type(vend_id, cpu_type_model, cpu_type_description, cpu_type_cores) VALUES('$cpuvendor', '$cpumodel', '$cputypedescription', '$cpucores')"); 
	echo "The CPU Type was added successfully with values: <br />" . "CPU Model Number: " . $cpumodel . "<br />" . "CPU Name: " . $cputypedescription . "<br />" . "CPU Cores: " .  $cpucores . "<br />" . "CPU Vendor: " . $cpuvendor . "<br />"; 
        pg_close(); 
        ?> 
    </body> 
</html> 
