<html> 
    <body> 
        <?php 
        $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
        
        $vend = pg_escape_string($_POST['vend']);
        $sw = pg_escape_string($_POST['sw']); 
        $sw_ver = pg_escape_string($_POST['sw_ver']);
        $arch = pg_escape_string($_POST['arch']);
        pg_query($db, "INSERT INTO cmd_software(software,arch_id,sw_ver,vend_id) VALUES('$sw', '$arch', '$sw_ver', '$vend')"); 
	echo 'The Software was added successfully with values: <br />' . 'Software Vendor: ' . $vend . '<br />' . 'Software Name: ' . $sw . '<br />' . 'Software Version: ' . $sw_ver . '<br />' . 'Software Architecture: ' . $arch . '<br />';
        pg_close(); 
        ?> 
    </body> 
</html> 
