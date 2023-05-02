<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Research Impact Project</title>

   <?php
   require 'header.php';
   ?>
</head>

<body>
<div class="container3">
      <!-- back button -->
      <a class="back-btn" href="home.php" > Back </a>
         <h2>Research Project</h2>
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
                  <h2> Edit Research Project</h2>
               </div>
               <img src="https://i.imgur.com/iGPyZYp.png">
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
                  <h2> Upload Research Project </h2>
               </div>
               <img src="https://i.imgur.com/jQKhmPH.png">
               <div class="clickhere">
                  <a href="uploadresearch.php">
                     <h3>Click Here</h3>
                  </a>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="p-3 border bg-light">
               <div class="col">
                  <h2> View all Research Project </h2>
               </div>
               <img src="https://i.imgur.com/ouOvbhj.png" width="45" height="31">
               <div class="clickhere">
                  <a href="projects.php">
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