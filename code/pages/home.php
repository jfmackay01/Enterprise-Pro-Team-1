<?php
   session_start();
   ?>
<html>
   <head>
      
      <?php
         require 'header.php';
         ?>
      
   </head>

   

   <body>
      <div class="welcome">
         <h1>
            Home Page
         </h1>
      </div>
      <br><br><br>
      

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

            <div class="col-lg-6">
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
