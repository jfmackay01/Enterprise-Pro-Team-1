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
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-4">
               <div class="text">
                  <h1>
                     Welcome to the Impact Evidence Platform!
                  </h1>
               </div>
            </div>
            <div class="col-md-4">
               <div class="box">
                  <form id="form"> 
                     <input type="search" name="q" placeholder="Search impact projects..">
                     <button>⌕</button>
                  </form>
               </div>
            </div>
            <div class="col-md-4">
               <div class="profile">
                  <a href="#profile"> <img src="https://i.imgur.com/hFKDKMc.png" width="40" height="40"></a>
               </div>
            </div>
         </div>
      </div>
      </div>
      <div class="sidebar">
         <a href="#home"><img src="https://i.imgur.com/uZhkzYe.png"></a>
         <a href="#upload"><img src="https://i.imgur.com/zmN7yGk.png"></a>
         <a href="#edit"><img src="https://i.imgur.com/i7PlofH.png"></a>
         <a href="#research"><img src="https://i.imgur.com/WvhnBrw.png"></a>
      </div>
      <div class="welcome">
         <h1>
            Home Page
         </h1>
      </div>
      <br><br><br>
      <div class ="container">
         <div class="row gy-5">
            <div class="col-lg-6">
               <div class="p-3 border bg-light">
                  <div class="res">
                     <h2> Research Project Records </h2>
                  </div>
                  <img src="https://i.imgur.com/y42BKUN.png">
                  <div class="clickhere">
                     <a href="#research">
                        <h3>Click Here</h3>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="p-3 border bg-light">
                  <div class="imp">
                     <h2> Impact Records </h2>
                  </div>
                  <img src="https://i.imgur.com/uosGz2q.png">
                  <div class="clickhere">
                     <a href="#impact">
                        <h3>Click Here</h3>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="p-3 border bg-light">
                  <div class="col">
                     <h2> Collaborators </h2>
                  </div>
                  <img src="https://i.imgur.com/XN4tpER.png">
                  <div class="clickhere">
                     <a href="#collaborator">
                        <h3>Click Here</h3>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="p-3 border bg-light">
                  <div class="Reviewers">
                     <h2> Reviewers </h2>
                  </div>
                  <img src="https://i.imgur.com/jQKhmPH.png">
                  <div class="clickhere">
                     <a href="#review">
                        <h3>Click Here</h3>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
