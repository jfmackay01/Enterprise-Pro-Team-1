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
<h1>Attempting to delete user. Do not refresh page.</h1>

<?php
    require_once('..//php/conductDeleteUser.php')
?>
</body>

</html>