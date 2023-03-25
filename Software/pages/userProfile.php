<?php
   session_start();
   ?>
<html>
   <head>
      
      <?php
         require 'header.php';
         ?>
      
   </head>

   

    <body>
        <?php
            require '../db/dbconnect.php';
            require('../php/showUser.php');
            if (isset($_SESSION["logon"])) {
            showUser($_SESSION['userID'], $conn);
            require('../php/changePasswordForm.php');
            }
            else{
                header('location: ../pages/home.php');
            }
        ?>
    </body>
</html>
