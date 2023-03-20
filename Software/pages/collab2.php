<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reviewers page</title>
    <?php
    require 'header.php';
    ?>
    <!-- css link -->
    <link rel="stylesheet" href="../css/standard.css">

</head>

<body>

   <div class="container4">
      <!-- back button -->
      <a class="back-btn" href="home.php" > Back </a>
         <h2>Collaborator name</h2>
      
        <!-- filter by option -->
         <select class="filter-select">
		      <option value="all">Filter By</option>
			   <option value="alphabet">Alphabet</option>
			   <option value="department">Department</option>
		   </select>
   </div>
   <br><br>

   <div class ="container">
      <div class="row gy-5">

         <div class="col-lg-4">
            <div class="p-3 border bg-light">
               <div class="res">
                  <h2> Edit Impact records</h2>
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
                  <h2> Upload Impact records </h2>
               </div>
               <img src="https://i.imgur.com/jQKhmPH.png">
               
               <div class="clickhere">
                  <a href="#Upload">
                     <h3>Click Here</h3>
                  </a>
               </div>
            </div>
         </div>
   </div>

   <br><br>    
   <div class ="container">
      <div class="row gy-5">

         <div class="col-lg-4">
            <div class="p-3 border bg-light">
               <div class="col">
                  <h2> Edit research project records </h2>
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
                  <h2> Upload research project records </h2>
               </div>
               <img src="https://i.imgur.com/jQKhmPH.png">

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
