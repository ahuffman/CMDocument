<html>
  <body>
    <?php
      include './include/menu.php';
      $qry_account = pg_query($db, "SELECT user_firstname, user_lastname, user_ip, user_lastlogin FROM cmd_users WHERE user_login='" . $_SESSION['user_login'] . "'");
      if (!$qry_account) {
        //query failed
        echo 'Bad query';
      }
      else {
        while ($account = pg_fetch_assoc($qry_account)) {
          echo '<table id="account">' . "\r\n" .
               '  <tr>' . "\r\n" .
               '    <td>' . Username . '</td>' . "\r\n" .
               '    <td>' . $_SESSION['user_login'] . '</td>' . "\r\n" .
               '  </tr>' . "\r\n" .
               '  <tr>' . "\r\n" .
               '    <td>' . 'Firstname:' . '</td>' . "\r\n" .
               '    <td>' . $account['user_firstname'] . '</td>' . "\r\n" .
               '  </tr>' . "\r\n" .
               '  <tr>' . "\r\n" .
               '    <td>' . 'Lastname:' . '</td>' . "\r\n" .
               '    <td>' . $account['user_lastname'] . '</td>' . "\r\n" .
               '  </tr>' . "\r\n" .
               '  <tr>' . "\r\n" . 
               '    <td>' . 'IP Address:' . '</td>' . "\r\n" .
               '    <td>' . $account['user_ip'] . '</td>' . "\r\n" .
               '  </tr>' . "\r\n" . 
               '  <tr>' . "\r\n" .
               '    <td>' . 'Last Login:' . '</td>' . "\r\n" . 
               '    <td>' . $account['user_lastlogin'] . '</td>' . "\r\n" .
               '  </tr>' . "\r\n" .
               '  <tr>' . "\r\n" .
               '    <td>' . 'Edit Account' . '</td>' . "\r\n" .
               '    <td>' . 'Reset Password' . '</td>' . "\r\n" .
               '  </tr>' . "\r\n" .
               '</table>' . "\r\n";
        }
      }
    ?>
  </body>
</html>
