<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="../css/standard.css">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload impact</title>

    <!-- Standard Page Header -->
    <?php
    require 'header.php';
    ?>


</head>

<body>

    <div class="container3">
        <!-- back button -->
        <a class="back-btn" href="impactproject.php">Back</a>
        <h2>Upload Impact Project</h2>
    </div>

    <section>
        <div class="container-fluid2">
            <div class="container">
                <div class="formBox">
                    <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
                                <!-- file selection -->
                                <input type="file" name="impFileUpload">

                                <br> <br>
                            </div>

                            <div class="click-btn">
                                <!-- submission button -->
                                <input value="Submit" type="submit" class="btn" name="Submit">
                            </div>

                            <?php


                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                //continue if used method is post

                                //if project has been selected
                                if ($_POST['project'] != 0) {
                                    //validate the form and upload file to database
                                    require_once '../php/impactUploadValidation.php';
                                    uploadImpactRecord($_POST['impactActivity'], $_POST['impactEvidence'], $_POST['project'], $conn);
                                } else {
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

<!---footer--->
<div class="footer">
    <div class="container">
        <br><br><br>
        <hr>
        <p class="creator">Team 1 Enterprise Pro 2023 - University of Bradford</p>
    </div>
</div>

</html>