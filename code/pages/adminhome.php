<?php
   session_start();
   ?>
<html>
   <head>
      <link rel="stylesheet" type="text/css" href="../css/standard.css">
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Admin Home</title>
      <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <?php
         require 'header.php';
         ?>
      <!-- ---------------- -->
      <script src='../js/javascriptFunctions.js'></script>
   </head>
   <body>
      <div class="welcome">
         <h1>
            Admin Home Page
         </h1>
      </div>
      <br><br><br>
      <div class ="container">
         <div class="row gy-5">
            <div class="col-lg-4">
               <div class="p-3 border bg-light">
                  <div class="res">
                     <h2> Dashboard </h2>
                  </div>
                  <img src="https://i.imgur.com/iGPyZYp.png">
                  <div class="clickhere">
                     <a href="#Dashboard">
                        <h3>Click Here</h3>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="p-3 border bg-light">
                  <div class="imp">
                     <h2> Master Spreadsheet </h2>
                  </div>
                  <img src="https://i.imgur.com/665Hakv.png">
                  <div class="clickhere">
                     <a href="#Spreadsheet">
                        <h3>Click Here</h3>
                     </a>
                  </div>
               </div>
            </div>
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
