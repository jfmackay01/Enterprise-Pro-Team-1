<?php
session_start();
?>

<!DOCTYPE HTML>
<html>

<head>
    <!-- Standard Page Header -->
    <?php
    require 'header.php';

    require "../db/dbconnect.php";
    ?>

</head>

<body>




    <?php


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $projectID = $_POST['projectID'];
        //if form has been submitted conduct the update
if (isset($_POST['conductEdit'])) {

        require_once '../php/conductEditProject.php';
    } 

        //get previous details
        $query = "SELECT * FROM research_project WHERE projectID = $projectID";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
            if ($project = mysqli_fetch_assoc($result)) {


                //get project details as local variables, defaulting to N/A if no value
                $projectTitle = empty($project['projectTitle']) ? "N/A" : $project['projectTitle'];
                $projectSummary = empty($project['projectSummary']) ? "N/A" : $project['projectSummary'];
                $projectInvestigator = empty($project['projectInvestigator']) ? "N/A" : $project['projectInvestigator'];
                $department = empty($project['departmentID']) ? "N/A" : $project['departmentID'];
                $researchOutput = empty($project['researchOutput']) ? "N/A" : $project['researchOutput'];

                $progress = empty($project['impactProgress']) ? "N/A" : $project['impactProgress'];
                $uoa = empty($project['uoaID']) ? "N/A" : $project['uoaID'];


                $meetings = empty($project['meetings']) ? "N/A" : $project['meetings'];
                $followup = empty($project['followup']) ? "N/A" : $project['followup'];
                $underpinnedResearch = empty($project['underpinnedResearch']) ? "N/A" : $project['underpinnedResearch'];
                $reach = empty($project['reach']) ? "N/A" : $project['reach'];
                $significance = empty($project['significance']) ? "N/A" : $project['significance'];
                $quality = empty($project['quality']) ? "N/A" : $project['quality'];
                $impactAssessment = empty($project['impactAssessment']) ? "N/A" : $project['impactAssessment'];


                $notes = empty($project['notes']) ? "N/A" : $project['notes'];
            }
        }
    }
    ?>
    <!-- containter for form -->
    <div class="container4">
        <!-- back button -->
        <a class="back-btn" href="projects.php">Back</a>
        <h2>Upload Research Project</h2>
    </div>
    <?php
    ?>
    <section>
        <div class="container-fluid2">
            <div class="container">
                <div class="formBox">
                    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row">
                            <h3>Associated Project</h3>
                            <br><br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!--project title text field -->
                                    <div class="inputBox">
                                        <br>
                                        <div class="inputText">Project Title</div>
                                        <input type="text" name="projectTitle" class="input" value="<?php echo $projectTitle; ?>">
                                    </div>
                                </div>

                                <!-- PI text field -->
                                <div class="col-sm-6">
                                    <div class="inputBox">
                                        <br>
                                        <div class="inputText">Project Investigator</div>
                                        <input type="text" name="projectInvestigator" class="input" value="<?php echo $projectInvestigator; ?>">
                                    </div>
                                </div>


                                <!-- faculty selection -->
                                <div>

                                    <?php
                                    //drop down menu for faculty selection with preselected
                                    require("../php/facultyDropDown.php");

                                    ?>
                                </div>
                                <br>
                                <br>


                                <!-- research output text area -->
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <br>
                                        <div class="inputText">Research Output</div>
                                        <br>
                                        <textarea class="input" name="researchOutput"><?php echo $researchOutput; ?></textarea>
                                    </div>
                                </div>
                                <!-- project summary text area -->
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <br>
                                        <div class="inputText">Project summary</div>
                                        <br>
                                        <textarea class="input" name="projectSummary"><?php echo $projectSummary; ?></textarea>
                                    </div>
                                </div>
                                <!-- Potential UOA-->
                                <div>


                                    <?php
                                    //drop down menu for UOA selection
                                    require("../php/UOAdropdown.php");

                                    ?>
                                </div>
                                <div>

                                    <?php
                                    //drop down menu for UOA selection
                                    require("../php/progressDropDown.php");

                                    ?>
                                </div>

                                <!-- notes text area -->

                                <?php

                                if ($_SESSION['admin']) {
                                    echo ("
                                <div class='col-sm-12'>
                                    <div class='inputBox'>
                                        <br>
                                        <div class='inputText'>Notes</div>
                                        <br>
                                        <textarea class='input' name='notes' >$notes</textarea>
                                    </div>
                                </div>");
                                } else {
                                    echo ("
                                    <input type='hidden' name='notes' value='$notes'>
                                ");
                                }
                                ?>

                                <!-- Meetings text area -->
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <br>
                                        <div class="inputText">Meetings</div>
                                        <br>
                                        <textarea class="input" name="meetings"><?php echo $meetings; ?></textarea>
                                    </div>
                                </div>
                                <!-- Follow up text area -->
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <br>
                                        <div class="inputText">Follow up</div>
                                        <br>
                                        <textarea class="input" name="followUp"><?php echo $followup; ?></textarea>
                                    </div>
                                </div>
                                <!-- underpinnedResearch text field -->
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <br>
                                        <div class="inputText">Underpinned Research</div>
                                        <br>
                                        <textarea class="input" name="underpinnedResearch"> <?php echo $underpinnedResearch; ?></textarea>
                                    </div>
                                </div>
                                <!-- reach text field-->
                                <div class="col-sm-4">
                                    <div class="inputBox">
                                        <div class="inputText">Reach</div>
                                        <input type="text" name="reach" class="input" value="<?php echo $reach; ?>">
                                    </div>
                                </div>

                                <!-- significance text field-->
                                <div class="col-sm-4">
                                    <div class="inputBox">
                                        <div class="inputText">Significance</div>
                                        <input type="text" name="significance" class="input" value="<?php echo $significance; ?>">
                                    </div>
                                </div>

                                <!-- quality text field-->
                                <div class="col-sm-4">
                                    <div class="inputBox">
                                        <div class="inputText">Quality</div>
                                        <input type="text" name="quality" class="input" value="<?php echo $quality; ?>">
                                    </div>
                                </div>

                                <!-- Impact Assessment text field-->
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                    <div class="inputText">Impact Assessment</div>
                                        <input type="text" name="impactAssessment" class="input" value="<?php echo $impactAssessment; ?>">
                                    </div>
                                </div>
                                <br>

                            </div>
                        </div>
                        <input type="hidden" name="conductEdit" value="true">
                        <input type="hidden" name="projectID" value="<?php echo $projectID; ?>">

                        <!-- submission button -->

                        <div class="click-btn">

                            <input value="Submit" type="submit" class="btn" name="Submit">

                        </div>
                        <?php



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