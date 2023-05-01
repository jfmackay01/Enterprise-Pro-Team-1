<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Users</title>

    <?php require 'header.php'; ?>

    <!-- CSS styles -->
    <link rel="stylesheet" href="../css/standard.css">
</head>

<body>

    <div class="container4">
        <!-- back button -->
        <a class="back-btn" href="home.php">Back</a>
        <h2>Users</h2>

        <!-- filter by role -->

        <div>
            <?php
            include("../php/userFilterSelection.php")
            ?>
        </div>
    </div>


    <div class="container5">
        <div class="content">

            <?php
            if (isset($_SESSION["logon"]) && $_SESSION['admin'] == true) {
                require '../php/showAllUsers.php';
            } else {
                header('location: ../pages/home.php');
            }
            ?>
        </div>
    </div>
    </div>


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