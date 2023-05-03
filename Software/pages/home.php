<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Home</title>

   <?php
   require 'header.php';
   ?>

</head>



<body>

   <script src="../js/cookie.notice.min.js"></script>

   <div class="welcome">
      <h1>
         Home Page
      </h1>
   </div>
   <br><br><br>


   <div class="container">
      <div class="row gy-5">


         <?php
         if (isset($_SESSION["logon"])) {
            if ($_SESSION["admin"] == true) { //if admin show admin links
               echo ("
            <div class='col-lg-6'>
               <div class='p-3 border bg-light'>
                  <div class='res'>
                     <h2> Dashboard </h2>
                  </div>
                  <img src='../img/laptop.png'>
                  <div class='clickhere'>
                     <a href='dashboard.php'>
                        <h3>Click Here</h3>
                     </a>
                  </div>
               </div>
            </div>
            <div class='col-lg-6'>
               <div class='p-3 border bg-light'>
                  <div class='imp'>
                     <h2> Users </h2>
                  </div>
                  <img src='../img/userhome.png'>
                  <div class='clickhere'>
                     <a href='users.php'>
                        <h3>Click Here</h3>
                     </a>
                  </div>
               </div>
            </div>
            ");
            }
         }
         ?>

         <div class="col-lg-6 mx-auto">
            <div class="p-3 border bg-light">
               <div class="col">
                  <h2> Research Project Records </h2>
               </div>
               <img src="../img/pr.png">
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
