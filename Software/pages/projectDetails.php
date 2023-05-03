<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
     
   <?php
   require 'header.php';
   ?>
    
    <title>Project Details</title>
    
</head>



<body>
   <div class="container3">
      <!-- back button -->
      <a class="back-btn" href="projects.php">Back</a>
      <h2>Project Details</h2>

      <!-- filter by department -->


   </div>


   <?php
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
