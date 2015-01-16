<html> 
  <body> 
    <?php
      include './include/menu.php';
      if (isset($_POST['contact_firstname'])) {$contact_firstname = pg_escape_string($_POST['contact_firstname']);} else {echo 'No value provided: contact firstname.'; exit();}
      if (isset($_POST['contact_lastname'])) {$contact_lastname = pg_escape_string($_POST['contact_lastname']);} else {echo 'No value provided: contact lastname.'; exit();}
      if (isset($_POST['contact_company'])) {$contact_company = pg_escape_string($_POST['contact_company']);} else {echo 'No value provided: contact company.'; exit();}
      if (isset($_POST['contact_phone'])) {$contact_phone = pg_escape_string($_POST['contact_phone']);} else {echo 'No value provided: contact phone number.'; exit();}
      if (isset($_POST['contact_website'])) {$contact_website = pg_escape_string($_POST['contact_website']);} else {echo 'No value provided: contact website.'; exit();}
      if (isset($_POST['contact_user'])) {$contact_user = pg_escape_string($_POST['contact_user']);} else {echo 'No value provided: contact username.'; exit();}
      if (isset($_POST['contact_pass'])) {$contact_pass = pg_escape_string($_POST['contact_pass']);} else {echo 'No value provided: contact password.'; exit();}
      if (isset($_POST['contact_email'])) {$contact_email = pg_escape_string($_POST['contact_email']);} else {echo 'No value provided: contact email.'; exit();}
      if (isset($_POST['contact_address'])) {$contact_address = pg_escape_string($_POST['contact_address']);} else {echo 'No value provided: contact address.'; exit();}
      if (isset($_POST['contact_notes'])) {$contact_notes = pg_escape_string($_POST['contact_notes']);} else {echo 'No value provided: contact notes.'; exit();}
      $qry_contact = pg_query($db, "INSERT INTO cmd_contacts(contact_firstname, contact_lastname, contact_company, contact_phone, contact_website, contact_user, contact_pass, contact_email, contact_address, contact_notes) VALUES('$contact_firstname', '$contact_lastname', '$contact_company', '$contact_phone', '$contact_website', '$contact_user', '$contact_pass', '$contact_email', '$contact_address', '$contact_notes')");
      if ($qry_contact) {
        echo 'The Contact was added successfully with values: <br />' . 'Contact First Name: ' . $contact_firstname . '<br />' . 'Contact Last Name: ' . $contact_lastname . '<br />' . 'Contact Company Name: ' . $contact_company . '<br />' . 'Contact Phone: ' . $contact_phone . '<br />' . 'Contact Website: ' . $contact_website . '<br />' . 'Contact Website User: ' . $contact_user . '<br />' . 'Contact Website Pass: ' . $contact_pass . '<br />' . 'Contact Email: ' . $contact_email . '<br />' . 'Contact Address: ' . $contact_address . '<br />' . 'Contact Notes: ' . $contact_notes . '<br />'; 
      }
      else {
        echo 'The Contact was not added successfully.' . '<br />' . "\r\n";
      }
    ?> 
  </body> 
</html> 
