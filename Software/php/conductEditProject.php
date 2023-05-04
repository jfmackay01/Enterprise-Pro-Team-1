<?php

//connect to database
require '../db/dbconnect.php';

$errors = array();

if (isset($_POST)) { // if used method is post, conduct edit project

    //get all variables from the template
    $projectTitle = $_POST['projectTitle'];
    $projectInvestigator = $_POST['projectInvestigator'];
    $faculty = $_POST['faculty'];
    $researchOutput = $_POST['researchOutput'];
    $projectSummary = $_POST['projectSummary'];
    $UOA = $_POST['UOA'];
    $progress = $_POST['impactProgress'];
    $notes = $_POST['notes'];
    $meetings = $_POST['meetings'];
    $followUp = $_POST['followUp'];
    $underpinnedResearch = $_POST['underpinnedResearch'];
    $reach = $_POST['reach'];
    $significance = $_POST['significance'];
    $quality = $_POST['quality'];
    
    $impactAssessment = $_POST['impactAssessment'];


    //all text fields and all options must be filled/sellected
    if (empty($projectTitle)) {
        array_push($errors, "Project title is required");
        echo "<p>Project title is required</p>";
    }

    if (empty($projectInvestigator)) {
        array_push($errors, "Project investigator is required");
        echo "<p>Project investigator is required</p>";
    }
    if ($faculty == 0) {
        array_push($errors, "Select your faculty!");
        echo "<p>Select your faculty!</p>";
    }
    if ($progress == 0) {
        array_push($errors, "Select progress state!");
        echo "<p>Select progress state!<p/>";
    }
    if (empty($researchOutput)) {
        array_push($errors, "Research Output is required");
        echo "<p>Research Output is required</p>";
    }
    if (empty($projectSummary)) {
        array_push($errors, "Project summary is required");
        echo "<p>Project summary is required</p>";
    }
    if (empty($UOA)) {
        array_push($errors, "Potential UOA is required");
        echo "<p>Potential UOA is required</p>";
    }
    if (empty($notes)) {
        array_push($errors, "Notes are required");
        echo "<p>Notes are required</p>";
    }
    if (empty($meetings)) {
        array_push($errors, "Meetings are required");
        echo "<p>Meetings are required</p>";
    }
    if (empty($followUp)) {
        array_push($errors, "Follow up is required");
        echo "<p>Follow up is required</p>";
    }
    if (empty($underpinnedResearch)) {
        array_push($errors, "Underpinned research is required");
        echo "<p>Underpinned research is required</p>";
    }
    if (empty($reach)) {
        array_push($errors, "Reach is required");
        echo "<p>Reach is required</p>";
    }
    if (empty($significance)) {
        array_push($errors, "Significance is required");
        echo "<p>Significance is required</p>";
    }
    if (empty($quality)) {
        array_push($errors, "Quality is required");
        echo "<p>Quality is required</p>";
    }
    if (empty($impactAssessment)) {
        array_push($errors, "Impact Assessment is required");
    }

    //if no errors update database
    if (count($errors) == 0) {


        //sql statement to add data to research_project table
        $query = "UPDATE research_project SET 
        projectTitle = '$projectTitle', departmentID = '$faculty', projectInvestigator ='$projectInvestigator', researchOutput = '$researchOutput',
        projectSummary = '$projectSummary', potentialUOA ='$UOA', impactProgress = '$progress', notes = '$notes', meetings = '$meetings',
        followup = '$followUp', underpinnedResearch = '$underpinnedResearch', reach = '$reach', significance = '$significance', quality = '$quality', 
        impactAssessment = '$impactAssessment' where projectID = $projectID";

        if (mysqli_query($conn, $query)) { //successful message printed out
            echo "Research Project Updated";
        } else {
            echo "Error updating the Research Project";
        }
    } else {
        echo ("Errors Found: ");
        foreach ($errors as $error) {
            echo  nl2br("\n") . $error;
        }
    }
}
