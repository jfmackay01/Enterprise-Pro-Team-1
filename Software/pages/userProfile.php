<?php
session_start();
?>
<html>
<!----general header--->
<head>

    <?php
    require 'header.php';
    ?>

</head>

<body>
<!----shows the user which is logged in details--->
    <?php
    require '../db/dbconnect.php';
    require('../php/showUser.php');
    ?>
 <!----form to change password + to log off--->
    <div class="container2">
        <div class="form">
            <?php
            if (isset($_SESSION["logon"])) {
                showUser($_SESSION['userID'], $conn);

                require('../php/logoffButton.php');
                require('../php/changePasswordForm.php');
            } else {
                header('location: ../pages/home.php');
            }
            ?>
        </div>
    </div>

    <!---footer--->
    <div class="footer">
        <div class="container">
            <br><br><br>
            <hr>
            <p class="creator">Team 1 Enterprise Pro 2023 - University of Bradford</p>
        </div>
    </div>
</html>
