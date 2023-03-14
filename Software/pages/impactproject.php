<?php
   session_start();
   ?>
<!DOCTYPE HTML>
<html>
   <head>
      <link rel="stylesheet" type="text/css" href="../css/standard.css">
      <!-- Standard Page Header -->
      <?php
         require 'header.php';
         ?>
      <!-- ---------------- -->
      <script src='../js/javascriptFunctions.js'></script>
   </head>
   <body>
      <a class="back-btn" href="home.php" > <img src="../img/back.png" width="50" height="50"></a>
      <div class="welcome">
         <h1>
            Impact Records
         </h1>
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
      <div class="res">
      <h2> Edit Impact Project</h2>
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
      <h2> Upload Impact Project </h2>
      </div>
      <img src="https://i.imgur.com/jQKhmPH.png">
      <div class="clickhere">
      <a href="#Upload">
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
      <img src="https://i.imgur.com/ouOvbhj.png" width="45" height="31">
      <div class="clickhere">
      <a href="#Upload">
      <h3>Click Here</h3>
      </a>
      </div>
      </div>
      </div>
      </div>
      </div>
   </body>
</html>
