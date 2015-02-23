<?php
  function showMessage($class,$message) {
    echo '<div class="'. $class . '">' . "\r\n" .
    "  " . 
    //adds space for proper html source code viewing
    $message . "\r\n" .
    '</div>' . "\r\n";
  }
?>
