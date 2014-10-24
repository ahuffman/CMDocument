<html> 
    <body> 
        <?php 
        $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
        $model = pg_escape_string($_POST['model']);
        $vendor = pg_escape_string($_POST['vendor']);
        $type = pg_escape_string($_POST['type']);        
        pg_query($db, "INSERT INTO cmd_model(model, vend_id, obj_type_id) VALUES('$model', '$vendor', '$type')"); 
	echo "The Model was added successfully with values: <br />" . "Model: " . $model . "<br />" . "Vendor ID: " . $vendor . "<br />" . "Model Type: " . $type . "<br />";
        pg_close(); 
        ?> 
    </body> 
</html> 
