<html> 
  <body> 
    <?php 
      $db = pg_connect("host=usfr-itdocument.insideidc.com dbname=cmdocument user=cmdocument password=h0twheels") or die('Could not connect');
      $contact_firstname = pg_escape_string($_POST['contact_firstname']); 
      $contact_lastname = pg_escape_string($_POST['contact_lastname']);
      $contact_company = pg_escape_string($_POST['contact_company']);
      $contact_phone = pg_escape_string($_POST['contact_phone']);
      $contact_website = pg_escape_string($_POST['contact_website']);
      $contact_user = pg_escape_string($_POST['contact_user']);
      $contact_pass = pg_escape_string($_POST['contact_pass']);
      $contact_email = pg_escape_string($_POST['contact_email']);
      $contact_address = pg_escape_string($_POST['contact_address']);
      $contact_notes = pg_escape_string($_POST['contact_notes']);
      pg_query($db, "INSERT INTO cmd_contacts(contact_firstname, contact_lastname, contact_company, contact_phone, contact_website, contact_user, contact_pass, contact_email, contact_address, contact_notes) VALUES('$contact_firstname', '$contact_lastname', '$contact_company', '$contact_phone', '$contact_website', '$contact_user', '$contact_pass', '$contact_email', '$contact_address', '$contact_notes')");
      echo 'The Contact was added successfully with values: <br />' . 'Contact First Name: ' . $contact_firstname . '<br />' . 'Contact Last Name: ' . $contact_lastname . '<br />' . 'Contact Company Name: ' . $contact_company . '<br />' . 'Contact Phone: ' . $contact_phone . '<br />' . 'Contact Website: ' . $contact_website . '<br />' . 'Contact Website User: ' . $contact_user . '<br />' . 'Contact Website Pass: ' . $contact_pass . '<br />' . 'Contact Email: ' . $contact_email . '<br />' . 'Contact Address: ' . $contact_address . '<br />' . 'Contact Notes: ' . $contact_notes . '<br />'; 
    ?> 
  </body> 
</html> 
