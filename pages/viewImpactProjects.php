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
        <a class="back-btn" href="projects.php" >Back</a>
        <h2>Impact Project</h2>
    </div>
    <table width=100%> 
        <tr>
            <th>Impact record name</th>
            <th>Impact record evidence</th>
        </tr>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $projectID = intval($_POST['projectID']);
            require_once('../db/dbconnect.php');
            require_once('../php/showImpactProjects.php');
            showImpactProjects($projectID, $conn);
        }

        ?>
    </table>
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