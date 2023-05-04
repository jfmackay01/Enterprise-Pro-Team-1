<?php
session_start();
?>

<!DOCTYPE HTML>
<html>

<head>
    <!-- Standard Page Header -->
    <?php
    require 'header.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $projectID = $_POST['projectID'];
        require "../db/dbconnect.php";
    }
    ?>

</head>

<body>
    <!-- containter for form -->
    <div class="container4">
        <!-- back button -->
        <a class="back-btn" href="projects.php">Back</a>
        <h2>Upload another file to Research Project <?php echo $projectID; ?></h2>
    </div>

    <section>
        <div class="container-fluid2">
            <div class="container">
                <div class="formBox">
                    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row">

                            <div class="row">

                                <input type="file" name="researchFileUpload">

                                <br> <br>

                            </div>
                        </div>


                        <div class="click-btn">

                            <!--Hidden form values for upload to work correctly -->
                            <input type='hidden' name='projectID' value='<?php echo $projectID ?>'>
                            <input type='hidden' name='upload' value='true'>

                            <!-- submission button -->
                            <input value="Submit" type="submit" class="btn" name="Submit">

                        </div>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST['upload'])) {
                                require_once '../php/uploadResearchFile.php';
                                uploadResearchFile($projectID, $_FILES['researchFileUpload'], $conn);
                            }
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