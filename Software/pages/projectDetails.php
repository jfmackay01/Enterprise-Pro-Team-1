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


<!----page to display all project details on a selected project--->
<body>
<div class="container4">
            <!-- back button -->
            <a class="back-btn" href="projects.php" >Back</a>
            <h2>Project Details </h2>
        </div>

   <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $projectID = $_POST['projectID'];
     }
     require "../db/dbconnect.php";
   require "../php/displayProjectDetails.php";
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