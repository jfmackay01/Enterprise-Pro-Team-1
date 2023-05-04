<?php
session_start();
?>
<html>

<head>

    <?php
    require 'header.php';
    require "../db/dbconnect.php";
    ?>
    <title> Edit Impact Project </title>

</head>

<body>
    
<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $impactID = $_POST["impactID"];
        //if form has been submitted conduct the update
        if (isset($_POST['validateEdit'])) {
            require_once '../php/editImpactValidation.php';
            editImpact($impactID, $conn);
        } 

        //get previous details
        $query = "SELECT * FROM impact_record WHERE impactID = $impactID";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
            if ($impact = mysqli_fetch_assoc($result)) {
                $impactActivity = $impact['impactActivity'];
                $impactEvidence = $impact['ImpactEvidence'];
            }
        }
    }

?>
<div class="container4">
        <!-- back button -->
        <a class="back-btn" href="viewImpactProjects.php" >Back</a>
        <h2>Edit Impact Project</h2>
    </div>

    <section>
    <div class="container-fluid2">
        <div class="container">
            <div class="formBox">
                 <!-- FORM -->
                <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="row">
                        <h3>Impact Record</h3>
                        <div class="row">

                        
                        <!-- impact activity text area-->
                        <div class="col-sm-12">
                                <div class="inputBox">
                                    <br>
                                    <div class="inputText">Impact Activity</div>
                                     <!-- Impact activity value-->
                                    <input type="text" name="impactActivity" class="input" value="<?php echo $impactActivity; ?>">
                                </div>
                        </div>
                        
                        <!-- Impact Evidence text area-->
                        <div class="col-sm-12">
                            <div class="inputBox">
                                <div class="inputText">Impact Evidence</div>
                                <textarea class="input" name="impactEvidence"> <?php echo $impactEvidence; ?></textarea> 
                            </div>
                        </div>
                       
                    </div>
                    <input type="hidden" name="validateEdit" value="true">
                     <!-- impactID value-->
                    <input type="hidden" name="impactID" value="<?php echo $impactID; ?>">
                  
                    <div class="click-btn">
                         <!-- submission button -->
                        <input value="Submit" type="submit" class="btn" name="Submit"> 
                    </div>
                      
                </form>
              
            </div>
        </div>
    </div>
</section>

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