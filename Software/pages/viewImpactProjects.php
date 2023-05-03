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
        <!--table for impact content -->
        <tr>
            <th>Impact record name</th>
            <th>Impact record evidence</th>
            <th>Impact record file</th>
            <th>Edit impact record </th>

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
     <!--download all files in zip -->
    <div class='col-md-4'>
        <form method="post" action="../php/downloadImpactZip.php">
        <input type='hidden' name='project' value='
        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $projectID = intval($_POST['projectID']);
            echo $projectID; }
        ?>'>
            <div class='p-3 border bg-light'>
                <div class='col'>
                    <h4> Download all files in zip folder </h4>
                </div>
                <img src='../img/pr.png'>
                <div class='clickhere'>
                    <a><button type='submit' name='createzip'><h3>Click Here</h3></button></a>
                </div>
            </div> 
        </form>   
    </div>
    <br>
     <!--upload impact evidence form -->
    <?php 
    if (isset($_SESSION["logon"])) {
        if ($_SESSION["admin"] == true || $_SESSION["collab"] == true ) {//if admin show upload impact project 
           echo("
                <div class='col-md-4'>
                    <div class='p-3 border bg-light'>
                        <div class='col'>
                            <h4> Upload Impact Evidence </h4>
                        </div>
                        <img src='../img/pr.png'>
                        <div class='clickhere'>
                            <a href='uploadimpact.php'>
                            <h3>Click Here</h3>
                            </a>
                        </div>
                    </div>    
                </div>
            ");
        }
    }
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