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
             <div class='col-lg-6'>
               <div class='p-3 border bg-light'>
                  <div class='res'>
                     <h2> Dashboard </h2>
                  </div>
                  <img src='https://i.imgur.com/iGPyZYp.png'>
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
                  <img src='https://i.imgur.com/XN4tpER.png'>
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
            <div class="col-lg-6">
               <div class="p-3 border bg-light">
                  <div class="col">
                     <h2> Research Project Records </h2>
                  </div>
                  <img src="https://i.imgur.com/jQKhmPH.png">
                  <div class="clickhere">
                     <a href="projects.php">
                        <h3>Click Here</h3>
                     </a>
                  </div>
               </div>
            </div>


         </div>
      </div>
         
             <!--Shows cookie acceptance box at bottom of screen, and does some javascript handling of storing if clicked or not locally-->
             <div class="cookiesaccept">
                <p>To use this website you must agree to use cookies. Press accept below to accept the usage of cookies.</p><button onclick="createItem()">Accept</button>
            </div>
               
            


      <!---footer--->
      <div class="footer">
        <div class="container">
            <br><br><br>
            <hr>
            <p class="creator">Team 1 Enterprise Pro 2023 - University of Bradford</p>
        </div>
      </div>



   </body>
</html>
