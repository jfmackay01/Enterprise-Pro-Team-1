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

<div class="container4">
        <!-- back button -->
        <a class="back-btn" href="impactproject.php" >Back</a>
        <h2>Research Project & Impact Project Notes</h2>
    </div>

    <section>
    <div class="container-fluid2">
        <div class="container">
            <div class="formBox">
                <form>
                    <div class="row">
                        <h3></h3>
                        <br><br>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <br>
                                <div class="inputText">Project Name</div>
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <br>
                                    <div class="inputText">PI and UoB Collaborators</div>
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="inputBox">
                                    <div class="inputText">Notes</div>
                                    <textarea class="input"></textarea> 
                                </div>
                            </div>
                            
                        <br><br>

                            
                    </div>
                </form>
                <div class="click-btn">
                        <h3>Submit</h3>
                  </div>
            </div>
        </div>
    </div>
</section>
</body> 



</html>