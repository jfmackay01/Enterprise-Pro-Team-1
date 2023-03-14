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
        <a class="back-btn" href="home.php" > <img src="../img/back.png" width="50" height="50"></a>
        <h2>Collaborator name</h2>
      
        <!-- filter by option -->
        <select class="filter-select">
			<option value="all">Filter By</option>
			<option value="alphabet">Alphabet</option>
			<option value="department">Department</option>
		</select>
    </div>


    <div class ="container">
         <div class="row gy-5">


         <?php
            if (isset($_SESSION["logon"])) {
               if ($_SESSION["admin"] == true) {//if admin show admin links
                  echo("

            <div class='col-lg-4'>
               <div class='p-3 border bg-light'>
                  <div class='res'>
                     <h2> Dashboard </h2>
                  </div>
                  <img src='https://i.imgur.com/iGPyZYp.png'>
                  <div class='clickhere'>
                     <a href='#Dashboard'>
                        <h3>Click Here</h3>
                     </a>
                  </div>
               </div>
            </div>
            <div class='col-lg-4'>
               <div class='p-3 border bg-light'>
                  <div class='imp'>
                     <h2> Master Spreadsheet </h2>
                  </div>
                  <img src='https://i.imgur.com/665Hakv.png'>
                  <div class='clickhere'>
                     <a href='#Spreadsheet'>
                        <h3>Click Here</h3>
                     </a>
                  </div>
               </div>
            </div>

            ");
         }
      }
   ?>


            <div class="col-lg-4">
               <div class="p-3 border bg-light">
                  <div class="col">
                     <h2> Research Project Records </h2>
                  </div>
                  <img src="https://i.imgur.com/jQKhmPH.png">
                  <div class="clickhere">
                     <a href="resimpproject.php">
                        <h3>Click Here</h3>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="p-3 border bg-light">
                  <div class="Reviewers">
                     <h2> Impact Records </h2>
                  </div>
                  <img src="https://i.imgur.com/uosGz2q.png">
                  <div class="clickhere">
                     <a href="impactproject.php">
                        <h3>Click Here</h3>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="p-3 border bg-light">
                  <div class="col">
                     <h2> Collaborators </h2>
                  </div>
                  <img src="https://i.imgur.com/XN4tpER.png">
                  <div class="clickhere">

                     <a href="collab.php">

                        <h3>Click Here</h3>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="p-3 border bg-light">
                  <div class="Reviewers">
                     <h2> Reviewers </h2>
                  </div>
                  <img src="https://i.imgur.com/USd6B2v.png">
                  <div class="clickhere">

                     <a href="rev.php">

                        <h3>Click Here</h3>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>



</body>

</html>
