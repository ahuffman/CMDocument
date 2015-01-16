<html>
  <body>
    <?php
      include './include/menu.php';
      if (isset($_POST['contact_id'])) {$contact_id = pg_escape_string($_POST['contact_id']);} else {echo 'No value provided: contact id.'; exit();}
      if (isset($_POST['contact_firstname'])) {$contact_firstname = pg_escape_string($_POST['contact_firstname']);} else {echo 'No value provided: contact firstname.'; exit();}
      if (isset($_POST['contact_lastname'])) {$contact_lastname = pg_escape_string($_POST['contact_lastname']);} else {echo 'No value provided: contact lastname.'; exit();}
      if (isset($_POST['contact_company'])) {$contact_company = pg_escape_string($_POST['contact_company']);} else {echo 'No value provided: contact company.'; exit();}
      if (isset($_POST['referer'])) {$ref = pg_escape_string($_POST['referer']);} else {echo 'No value provided: referer.'; exit();}
      if (isset($ref)) {
        $delete = pg_query($db, "DELETE FROM cmd_contacts WHERE contact_id=$contact_id");
        if (!$delete) {
          echo 'Delete Failed.';
          header("Refresh: $msg_display_time; URL=$ref");
        }
        else {
          echo 'Deleted ' . $contact_company . ' - ' . $contact_lastname . ", " . $contact_firstname . ' from the database.' . '<br />';
          header("Refresh: $msg_display_time; URL=$ref");
        }
      }
    ?>
  </body>
</html>
