<?php

function uploadResearchProject() {

/*function uploadResearchProject( $projectTitle, $projectInvestigator, 
$grants_radio, $faculty, $summaryOfResearch, $researchOutput, $projectSummary, $UOA, $progress
$notes, $meetings, $followUp, $underpinnedResearch, $reach, $significance, $quality,
$conn) {*/
    //connect to database
    require '../db/dbconnect.php';

    $errors = array();
  
    if (isset($_POST)) {    

        //get all variables from the template
        $projectTitle = $_POST['projectTitle'];
        $projectInvestigator = $_POST['projectInvestigator'];
        $grants_radio = $_POST['grants_radio'];
        $grants_dateGiven = $_POST['grants_dateGiven'];
        $grants_amount = $_POST['grants_amount'];
        $grants_givenBy = $_POST['grants_givenBy'];
        $faculty = $_POST['faculty'];
        $summaryOfResearch = $_POST['summaryOfResearch'];
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
       
        //all text fields and all options must be filled/sellected
        if (empty($projectTitle)) {
            array_push($errors, "Project title is required");
          }

        if (empty($projectInvestigator)) {
            array_push($errors, "Project investigator is required");
          }
        if ($grants_radio == 1) {
            if (empty($grants_dateGiven) || empty($grants_amount) empty($grants_givenBy)) {
            array_push($errors, "Grants details required");
            }
        }
        if ($faculty == 0) {
            array_push($errors, "Select your faculty!");
        }
        if ($progress == 0) {
            array_push($errors, "Select progress state!");
        }
        if (empty($summaryOfResearch)) {
            array_push($errors, "Summary of Research is required");
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


         //if no errors add to database
        if (count($errors) == 0) {
            
            //if selected yes on grants
            if ($grants_radio == 1) {
                //insert into table grants given values
                $sql = "INSERT INTO research_grants(amount, dateGiven, givenBy) VALUES ('$grants_amount', '$grants_dateGiven', '$grants_givenBy')";
                if(mysqli_query($conn, $sql)) {
                    echo "Grant added succesfully";
                } else {
                    echo "Adding grant's details failed!";
                }
            }
            //get lastest inserted id for grant id 
            if ($grants_radio == 1) {
                $grantID = mysqli_insert_id($conn);
            } else {
                $grantID = null;
            }

            //get faculty id
            $query = "SELECT * FROM departments WHERE departmentID = $faculty";
            $result = mysqli_query ($conn, $query);
            $check = mysqli_fetch_assoc($result);
            if (!$check) {
                array_push($errors, "Error getting the faculty details");
            }
             
            //get UOA id
            $query = "SELECT * FROM uoa WHERE uoaID = $UOA";
            $result = mysqli_query ($conn, $query);
            $check = mysqli_fetch_assoc($result);
            if (!$check) {
                array_push($errors, "Error getting the UOA details");
            }

             //get progress id
             $query = "SELECT * FROM progress WHERE progressID = $progress";
             $result = mysqli_query ($conn, $query);
             $check = mysqli_fetch_assoc($result);
             if (!$check) {
                 array_push($errors, "Error getting the progress details");
             }

            if (count($errors ==0)) {
                $query = "INSERT INTO research_project (projectTitle, departmentID, projectInvestigator, 
                grantID, researchOutput, projectSummary, potentialUOA, impactProgress, notes, meetings, 
                followup, underpinnedResearch, reach, significance, quality) VALUES ('$projectTitle', 
                '$faculty', '$projectInvestigator', '$grantID', '$researchOutput', '$projectSummary',
                '$UOA','$progress', '$notes', '$meetings', '$followup', '$underpinnedResearch','$reach',
                '$significance', '$quality)";


                if (mysqli_query($conn, $query)) {
                    //Impact evidence added sucessfully
                    echo ("<br> Impact Evidence added!");

                }
                else {
                    echo "Error adding the Research Project";
                }
            }

        }
    }
}
        