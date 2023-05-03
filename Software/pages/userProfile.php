<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <?php
    require 'header.php';
    ?>
    
    <title>User profile</title>

</head>

<body>

    <?php
    require '../db/dbconnect.php';
    require('../php/showUser.php');
    ?>

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
