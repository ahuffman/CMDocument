<html> 
    <body> 
        <?php 
        $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');

        $inttype = pg_escape_string($_POST['inttype']); 
        $inttypedesc = pg_escape_string($_POST['inttypedesc']); 
        pg_query($db, "INSERT INTO cmd_interface_type(int_type, int_type_desc) VALUES('$inttype', '$inttypedesc')"); 
	echo "The interface type was added successfully with values: <br />" . "Interface Type: " . $inttype . "<br />" . "Interface Type Description: " . $inttypedesc . "<br />"; 
        pg_close(); 
        ?> 
    </body> 
</html> 
