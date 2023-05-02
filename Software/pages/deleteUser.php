<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Delete user</title>



    <?php
    require 'header.php';
    ?>

</head>



<body>
    <h1>Attempting to delete user. Do not refresh page.</h1>

    <?php
    require_once('..//php/conductDeleteUser.php')
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