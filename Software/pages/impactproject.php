<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <link rel="stylesheet" type="text/css" href="../css/standard.css">
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Impact Project</title>

   <!-- Standard Page Header -->
   <?php
   require 'header.php';
   ?>
   <!-- ---------------- -->
   <script src='../js/javascriptFunctions.js'></script>
</head>

<body>

   <div class="container3">
      <!-- back button -->
      <a class="back-btn" href="home.php"> Back </a>
      <h2>Impact Records</h2>
   </div>

   <br><br>
   <div class="content" align="center">
      <label for="categories">Please choose one of the following faculties:</label>
      <input type="text" list="categories">
      <datalist id="categories">
         <option value="Engineering & Informatics">
         <option value="Health Studies">
         <option value="Life Sciences">
         <option value="Management, Law and SS">
      </datalist>
      <input type="submit">
   </div>
   <br><br><br>
   <div class="container">
      <div class="row gy-5">
         <div class="col-lg-4">
            <div class="p-3 border bg-light">
               <div class="res">
                  <h2> Edit Impact Project</h2>
               </div>
               <img src="../img/laptop.png">
               <div class="clickhere">
                  <a href="#Edit">
                     <h3>Click Here</h3>
                  </a>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="p-3 border bg-light">
               <div class="col">
                  <h2> Upload Impact Project </h2>
               </div>
               <img src="../img/pr.png">
               <div class="clickhere">
                  <a href="uploadimpact.php">
                     <h3>Click Here</h3>
                  </a>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="p-3 border bg-light">
               <div class="col">
                  <h2> View all Impact Project </h2>
               </div>
               <img src="../img/view.png" width="45" height="31">
               <div class="clickhere">
                  <a href="viewAllImpact.php">
                     <h3>Click Here</h3>
                  </a>
               </div>
            </div>
         </div>
      </div>
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