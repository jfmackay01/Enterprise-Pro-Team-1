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


<!----page in order to delete user, using php ---->

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