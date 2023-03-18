<?php
session_start();
?>
<html>

<head>

    <?php
    require 'header.php';
    ?>
projectSummary
</head>

<body>

    <?php
    if (isset($_SESSION["logon"])) {
        //input needed files
        require_once("../db/dbconnect.php");
        require_once("../php/showImpactProjects.php");

 

        if ($_SESSION["admin"] == true) {


            $query = "SELECT projectID FROM research_project";
        } else {
            $userID = $_SESSION['userID'];
            $query = "SELECT projectID FROM research_project WHERE projectID IN (SELECT projectID FROM project_allocations WHERE userID =  '$userID' )";
        }


        //run query
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
            while ($project = mysqli_fetch_assoc($result)) {
                showImpactProjects($project['projectID'], $conn);
            }
        }
        $conn->close();
    }
    
    ?>

</body>


</html>