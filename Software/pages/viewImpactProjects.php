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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $projectID = intval($_POST['projectID']);
        require_once('../db/dbconnect.php');
        require_once('../php/showImpactProjects.php');
        showImpactProjects($projectID, $conn);
    }

    ?>

</body>

</html>