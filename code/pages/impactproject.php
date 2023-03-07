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
    <br />
   




</body> 



</html>