<?php
   session_start();
   ?>
<!DOCTYPE HTML>
<html>
   <head>
      <link rel="stylesheet" type="text/css" href="standard.css">
      <!-- Standard Page Header -->
      <?php
         require 'header.php';
         ?>
      <!-- ---------------- -->
      <script src='../js/javascriptFunctions.js'></script>
   </head>
   <body>
         <div class="container4">
            <!-- back button -->
            <a class="back-btn" href="home.php" >Back</a>
            <h2>Impact Project Record</h2>
         </div>
         <br><br>


         <div  class = "content" align = "center">
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
      <div class ="container">
         <div class="row gy-5">

         
               <div class="col-lg-4">
                  <div class="p-3 border bg-light">
                     <div class="Reviewers">
                        <h3>Edit Impact Record</h3>
                     </div>
                     <img src="https://i.imgur.com/jQKhmPH.png">
                        <div class="click-btn" onclick="window.location.href = '#edit';">
                           <h4>Click here</h4>
                        </div>
                  </div>
               </div>

         
               <div class="col-lg-4">
                  <div class="p-3 border bg-light">
                     <div class="Reviewers">
                        <h3>Upload Impact Record</h3>
                     </div>
                     <img src="https://i.imgur.com/jQKhmPH.png">
                     <div class="click-btn" onclick="window.location.href = 'uploadimpact.php';">
                           <h4>Click here</h4>
                     </div>
                  </div>
               </div>


            <div class="col-lg-4">
                     <div class="p-3 border bg-light">
                        <div class="Reviewers">
                           <h3>View all Impact Records</h3>
                        </div>
                        <img src="https://i.imgur.com/jQKhmPH.png">
                        <div class="click-btn" onclick="window.location.href = '#view';">
                              <h4>Click here</h4>
                        </div>
                     </div>
                  </div>


            </div>
         </div>
      </div>
      
   </body>
</html>
