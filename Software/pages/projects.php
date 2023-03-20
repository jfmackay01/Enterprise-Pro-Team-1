<?php
    session_start();
?>
<html>

<head>

    <?php
        require 'header.php';
    ?>

</head>

</body>

<?php
//if logged in then show assigned projects
        if (isset($_SESSION["logon"])){
            require '../pages/viewAssignedResearchProjects.php'; 
        }
        else{
            echo ("Logon to view projects");
        }

        ?>

</body>

</html>