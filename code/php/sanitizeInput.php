<?php
/**
 * removes whitespace, slashes and html code
 */ 
function sanitizeInput($input) {
  $input = trim($input);
  $input = stripslashes($input);
  $input = htmlspecialchars($input);
  return $input;
}

?>