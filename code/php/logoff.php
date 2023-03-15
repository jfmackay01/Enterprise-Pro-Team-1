<?php
//destroy session variables and return to home page
session_start();
session_unset();
session_destroy();
header('location: ../pages/home.php');
?>  