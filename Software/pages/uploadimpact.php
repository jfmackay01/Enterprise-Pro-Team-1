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

<div class="container4">
        <!-- back button -->
        <a class="back-btn" href="impactproject.php" >Back</a>
        <h2>Upload Impact Project</h2>
    </div>

    <section>
    <div class="container-fluid2">
        <div class="container">
            <div class="formBox">
                <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="row">
                        <h3>Impact Record</h3>
                        <div class="row">

                            
                        <?php
                            //drop down menu for project selection
                            require("../php/projectDropDown.php");
                        ?>

                        <!-- impact activity text area-->
                        <div class="col-sm-12">
                                <div class="inputBox">
                                    <br>
                                    <div class="inputText">Impact Activity</div>
                                    
                                    <input type="text" name="impactActivity" class="input">
                                </div>
                        </div>
                        
                        <!-- Impact Evidence text area-->
                        <div class="col-sm-12">
                            <div class="inputBox">
                                <div class="inputText">Impact Evidence</div>
                                <textarea class="input" name="impactEvidence"></textarea> 
                            </div>
                        </div>

                        <input type="file" name="impFileUpload">
                    
                        <br> <br>
                    </div>
                  
                    <div class="click-btn">
                        
                        <input value="Submit" type="submit" class="btn" name="Submit"> 
                    </div>
                      
                <?php 
             
               
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                     if ($_POST['project'] != 0) {
                  
                        require_once '../php/fileUploadValidation.php';
                        uploadImpactRecord(intval($_POST['impactActivity']), intval($_POST['impactEvidence']), intval($_POST['project']), $conn);
                        require_once '../php/uploadImpactFile.php';
                        uploadImpactFile(intval($_POST['impFileUpload']), intval($_POST['project']), $conn);
                        
                    }
                     else{
                        echo "Please select project!";
                     }
                     
                 }
                    ?>
                </form>
              
            </div>
        </div>
    </div>
</section>
</body> 



</html>