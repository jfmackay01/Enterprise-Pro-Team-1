<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

function uploadResearchProject()
{

    //connect to database
    require '../db/dbconnect.php';

    $errors = array();
    $noError = true;

    if (isset($_POST)) {



        //get all variables from the template
        $projectTitle = $_POST['projectTitle'];
        $projectInvestigator = $_POST['projectInvestigator'];
        $grants_radio = $_POST['grants_radio'];
        $grants_dateGiven = $_POST['grants_dateGiven'];
        $grants_amount = $_POST['grants_amount'];
        $grants_givenBy = $_POST['grants_givenBy'];
        $faculty = $_POST['faculty'];
       /* $summaryOfResearch = $_POST['summaryOfResearch'];*/
        $researchOutput = $_POST['researchOutput'];
        $projectSummary = $_POST['projectSummary'];
        $UOA = $_POST['UOA'];
        $progress = $_POST['impactProgress'];
        $notes = $_POST['notes'];
        $meetings = $_POST['meetings'];
        $followUp = $_POST['followUp'];
        $underpinnedResearch = $_POST['underpinnedResearch'];
        $reach = $_POST['reach'];
        $significance = $_POST['projectSummary'];
        $quality = $_POST['quality'];
        $impactAssessment = $_POST['impactAssessment'];

        //set boolean for if a grant is given
        $grantGiven = ($grants_radio == 1);


        //all text fields and all options must be filled/sellected
        if (empty($projectTitle)) {
            array_push($errors, "Project title is required");
        }

        if (empty($projectInvestigator)) {
            array_push($errors, "Project investigator is required");
        }

        if ($grants_radio == 0) {
            array_push($errors, "Grants details required");
        }

        if ($grants_radio == 1) { // if the grant has been given, show grant text fields
            if (strlen($grants_dateGiven) == 0) {
                array_push($errors, "Grant date details required");
                $noError = false;
            }

            if (empty($grants_amount)) {
                array_push($errors, "Grant amount details required");
                $noError = false;
            }

            if (empty($grants_givenBy)) {
                array_push($errors, "Grant given by... details required");
                $noError = false;
            }

            $noError = true;
        }

        if ($faculty == 0) {
            array_push($errors, "Select your faculty!");
        }
        if ($progress == 0) {
            array_push($errors, "Select progress state!");
        }
      
        if (empty($researchOutput)) {
            array_push($errors, "Research Output is required");
        }
        if (empty($projectSummary)) {
            array_push($errors, "Project summary is required");
        }
        if (empty($UOA)) {
            array_push($errors, "Potential UOA is required");
        }
        if (empty($notes)) {
            array_push($errors, "Notes are required");
        }
        if (empty($meetings)) {
            array_push($errors, "Meetings are required");
        }
        if (empty($followUp)) {
            array_push($errors, "Follow up is required");
        }
        if (empty($underpinnedResearch)) {
            array_push($errors, "Underpinned research is required");
        }
        if (empty($reach)) {
            array_push($errors, "Reach is required");
        }
        if (empty($significance)) {
            array_push($errors, "Significance is required");
        }
        if (empty($quality)) {
            array_push($errors, "Quality is required");
        }
        if (empty($impactAssessment)) {
            array_push($errors, "Impact Assessment is required");
        }

        if (empty($_FILES['researchFileUpload']['name'])) {
            array_push($errors, "Please select a file");
        }

        //if no errors add to database
        if (count($errors) == 0 && $noError) {
        }

        //get faculty id
        $query = "SELECT * FROM departments WHERE departmentID = $faculty";
        $result = mysqli_query($conn, $query);
        $check = mysqli_fetch_assoc($result);
        if (!$check) {
            array_push($errors, "Error getting the faculty details");
        }

        //get UOA id
        $query = "SELECT * FROM uoa WHERE uoaID = $UOA";
        $result = mysqli_query($conn, $query);
        $check = mysqli_fetch_assoc($result);
        if (!$check) {
            array_push($errors, "Error getting the UOA details");
        }

        //get progress id
        $query = "SELECT * FROM progress WHERE progressID = $progress";
        $result = mysqli_query($conn, $query);
        $check = mysqli_fetch_assoc($result);
        if (!$check) {
            array_push($errors, "Error getting the progress details");
        }
        // if there is no errors
        if (count($errors) == 0) {


            //sql statement to add data to research_project table
            $query = "INSERT INTO research_project (projectTitle, departmentID, projectInvestigator, 
                                    grantGiven, researchOutput, projectSummary, potentialUOA, impactProgress, notes, meetings, 
                                    followup, underpinnedResearch, reach, significance, quality, impactAssessment) VALUES ('$projectTitle', 
                                    '$faculty', '$projectInvestigator', '$grantGiven', '$researchOutput', '$projectSummary',
                                    '$UOA','$progress', '$notes', '$meetings', '$followUp', '$underpinnedResearch','$reach',
                                    '$significance', '$quality', '$impactAssessment')";



            if (mysqli_query($conn, $query)) {
                //Research Project added sucessfully
                echo ("<p> Research Project added!</p>");

                //get project ID as last inserted ID into database
                $projectID = mysqli_insert_id($conn);

                if ($projectID != 0) {
                    //upload file to research_file table with corresponding project ID
                    require_once '../php/uploadResearchFile.php';
                    uploadResearchFile($projectID, $_FILES['researchFileUpload'], $conn);


                    //if there is a grant given insert into database
                    if ($grantGiven) {
                        //insert into table research_grant given values
                        $sql = "INSERT INTO research_grant(projectID, amount, dateGiven, givenBy) VALUES ('$projectID' ,'$grants_amount', '$grants_dateGiven', '$grants_givenBy')";
                        if (mysqli_query($conn, $sql)) {
                            echo "<p>Grant added succesfully!</p>";
                        } else {
                            echo "Adding grant's details failed!";
                        }
                    }
                } else {
                    echo "<br> Error adding the file";
                }
            } else {
                echo "Error adding the Research Project";
            }

        }
        else{
            echo ("Errors Found: ");
            foreach ($errors as $error) {
                echo  nl2br("\n") . $error;
            }
        }
    }
}
