<?php
ini_set ('error_reporting', E_ALL); ini_set ('display_errors', 1); ini_set ('display_startup_errors', 1);

function uploadGrants() {

    //connect to database
    require '../db/dbconnect.php';

    $errors = array();
  
    if (isset($_POST)) {  

        //get all data from the template
        $grants_dateGiven = $_POST['grants_dateGiven'];
        $grants_amount = $_POST['grants_amount'];
        $grants_givenBy = $_POST['grants_givenBy'];
        $project = $_POST['project'];

        //all text fields must be filled/sellected
        if (strlen($grants_dateGiven) == 0) {
            array_push($errors, "Grant date details required");
            echo "<p> Grant date details required </p>";
          
        }

        if (empty($grants_amount)) {
            array_push($errors, "Grant amount details required");
            echo "<p> Grant amount details required</p>";
        
        }

        if (empty($grants_givenBy)) {
            array_push($errors, "Grant given by... details required");
            echo "<p> Grant given by details required</p>";
         
        }

        if($project == 0 ) {
            array_push($errors, "Select project!");
            echo "<p>Select your project!</p>";
        }

        if (count($errors) == 0) { //continue if there were no errors
             //insert into table research_grant given values
             $sql = "INSERT INTO research_grant(projectID, amount, dateGiven, givenBy) VALUES ('$project' ,'$grants_amount', '$grants_dateGiven', '$grants_givenBy')";
             if(mysqli_query($conn, $sql)) {
                 echo "<p>Grant added succesfully!</p>";
             } else {
                 echo "Adding grant's details failed!";
             }
        }
    }


}