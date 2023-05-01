<?php
session_start();
?>

<!DOCTYPE HTML>
<html>

<head>
<!-- Standard Page Header -->
    <?php
    require 'header.php';
    ?>   

</head>

<body>  
<!-- containter for form -->
    <div class="container4">
            <!-- back button -->
            <a class="back-btn" href="projects.php" >Back</a>
            <h2>Upload more grants </h2>
        </div>

        <section>
        <div class="container-fluid2">
            <div class="container">
                <div class="formBox">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="row">
                            <h3>Please insert following details about Grant</h3>
                            <br><br>
                            <div class="row">
                            
                                <!-- associated grants -->
                                <div class="col-sm-12">
                                 <div class="inputBox">
                                    
                                    <br>
                                        <?php require("../php/projectDropDown.php");  
                                        ?>
                                        <!-- displaying the form after clicking on YES button -->
                                        <div id="grants_radio1Div" class="grants"> 
                                            <div class="inputText">Date given: </div>
                                                <input type="date" name="grants_dateGiven" class="input">
                                                <input type="text" name="grants_amount" class="input" placeholder="Amount...">
                                                <input type="text" name="grants_givenBy" class="input"placeholder="Given by...">
                                            </div>

                                      
                                    </div>
                                </div> <br>
                               
                            </div> 
                         <!-- submission button -->
                    
                        <div class="click-btn">
                            
                            <input value="Submit" type="submit" class="btn" name="Submit"> 

                        </div>
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                //continue if used method is post
                                 
                                //validate the form and upload file to database
                                require_once '../php/uploadGrantsValidation.php';
                                uploadGrants();
                            }
                        
                        
                        ?>
                    </form>
                       
                </div>
            </div>
        </div>
        </section>
    </div>
</body> 

<!---footer--->
<div class="footer">
        <div class="container">
            <br><br><br>
            <hr>
            <p class="creator">Team 1 Enterprise Pro 2023 - University of Bradford</p>
        </div>
      </div>

</html>