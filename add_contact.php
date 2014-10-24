<html> 
    <body> 
        <?php 
        $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');

        $firstname = pg_escape_string($_POST['first']); 
	$lastname = pg_escape_string($_POST['last']);
	$company = pg_escape_string($_POST['company']);
	$phone = pg_escape_string($_POST['phone']);
	$website = pg_escape_string($_POST['site']);
	$user = pg_escape_string($_POST['user']);
	$pass = pg_escape_string($_POST['pass']);
	$email = pg_escape_string($_POST['email']);
	$address = pg_escape_string($_POST['address']);
	$notes = pg_escape_string($_POST['notes']);
	pg_query($db, "INSERT INTO cmd_contacts(contact_firstname, contact_lastname, contact_company, contact_phone, contact_website, contact_user, contact_pass, contact_email, contact_address, contact_notes) VALUES('$firstname', '$lastname', '$company', '$phone', '$website', '$user', '$pass', '$email', '$address', '$notes')");
	echo "The Contact was added successfully with values: <br />" . "Contact First Name: " . $firstname . "<br />" . "Contact Last Name: " . $lastname . "<br />" . "Contact Company Name: " . $company . "<br />" . "Contact Phone: " . $phone . "<br />" . "Contact Website: " . $website . "<br />" . "Contact Website User: " . $user . "<br />" . "Contact Website Pass: " . $pass . "<br />" . "Contact Email: " . $email . "<br />" . "Contact Address: " . $address . "<br />" . "Contact Notes: " . $notes . "<br />"; 
        pg_close(); 
        ?> 
    </body> 
</html> 
