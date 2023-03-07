<?php
session_start();
?>

<!DOCTYPE HTML>
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
         <a href="#expand"><img src="https://i.imgur.com/Rl5CR5n.png"></a>
         <a href="#home"><img src="https://i.imgur.com/bFE2Uuh.png"></a>
         <a href="#storage"><img src="https://i.imgur.com/42pQawn.png"></a>
         <a href="#upload"><img src="https://i.imgur.com/C5WOXxz.png"></a>
         <a href="#dashboard"><img src="https://i.imgur.com/Z8S6WuZ.png"></a>
      </div>
      <div class="welcome">
         <h1>
            Research Project Impact
         </h1>
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
           
         </div>
           
      </div>

</body> 



</html>