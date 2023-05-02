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
    <title>Upload more research files</title>
    <!-- Standard Page Header -->
    <?php
    require 'header.php';
    ?>

</head>

<body>
    <!-- containter for form -->
    <div class="container3">
        <!-- back button -->
        <a class="back-btn" href="projects.php">Back</a>
        <h2>Upload more files for a Research Project</h2>
    </div>

    <section>
        <div class="container-fluid2">
            <div class="container">
                <div class="formBox">
                    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row">
                            <h3>Associated Project</h3>
                            <br><br>
                            <div class="row">

                                <?php
                                //drop down menu for project selection
                                require("../php/projectDropDown.php");

                                ?>
                                <br>
                                <input type="file" name="researchFileUpload">

                                <br> <br>

                            </div>
                        </div>
                        <!-- submission button -->

                        <div class="click-btn">

                            <input value="Submit" type="submit" class="btn" name="Submit">

                        </div>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            //continue if used method is post

                            //validate the form and upload file to database
                            //upload file to research_file table with corresponding project ID
                            require_once '../php/uploadResearchFile.php';
                            uploadResearchFile($_POST['project'], $_FILES['researchFileUpload'], $conn);
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