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
    echo("<br>");
    
    if (isset($_SESSION["logon"])) {
        showUser($_SESSION['userID'], $conn);
        require('../php/logoffButton.php');
        require('../php/changePasswordForm.php');
        
    } else {
        header('location: ../pages/home.php');
    }
    ?>
    
</body>
<!---footer--->
<div class="footer">
        <div class="container">
            <br><br><br>
            <hr>
            <p class="creator">Team 1 Enterprise Pro 2023 - University of Bradford</p>
        </div>
      </div>
</html>