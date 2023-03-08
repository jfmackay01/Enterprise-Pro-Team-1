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



      <div class="welcome">
         <h1>
            Research Project Impact
         </h1>
      </div>
      <br><br><br>
      <div class="back button">
        <button>Back</button>
      </div>
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