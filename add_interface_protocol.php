<html> 
    <body> 
        <?php 
        $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');

        $intproto = pg_escape_string($_POST['intproto']); 
        pg_query($db, "INSERT INTO cmd_interface_protocol(int_proto) VALUES('$intproto')"); 
	echo "The Interface Protocol was added successfully with values: <br />" . "Interface Protocol: " . $intproto . "<br />";
        pg_close(); 
        ?> 
    </body> 
</html> 
