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

    <div class="container4">
        <!-- back button -->
        <a class="back-btn" href="impactproject.php" >Back</a>
        <h2>View all Impact Projects</h2>
    </div>
    <div>
        <table width=100%>
            <tr>
                <th>Name</th>
                <th>Evidence</th>
            </tr>

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
        </table>
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