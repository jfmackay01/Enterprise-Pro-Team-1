<?php

function conductAssignation($userID, $projectID, $role, $conn)
{
    require_once("../db/dbConnect.php");
    $errors = array();
    //check correct input form
    if (!is_int($userID) || !is_int($projectID) || !is_int($role)) {
        array_push($errors, "INCORRECT INPUT FORMAT");
    } else if ($role != 0 && $role != 1) {
        array_push($errors, "INCORRECT INPUT. WRONG ROLE VALUES");
    }

    //check user and project exist
    if (count($errors) == 0) {
        $query = "SELECT * FROM users WHERE userID = '$userID'";

        $result = mysqli_query($conn, $query);
        $check = mysqli_fetch_assoc($result);
        if (!$check) {
            array_push($errors, "User does not exist");
        }

        $query = "SELECT * FROM research_project WHERE projectID = '$projectID'";

        $result = mysqli_query($conn, $query);
        $check = mysqli_fetch_assoc($result);
        if (!$check) {
            array_push($errors, "Research project does not exist");
        }
    }

    //Check that the user isn't already assigned to the project
    if (count($errors) == 0) {

        $query = "SELECT * FROM project_allocations WHERE userID='$userID' AND projectID = '$projectID' LIMIT 1";

        $result = mysqli_query($conn, $query);
        //$check = mysqli_fetch_assoc($result);
        //echo ($check);
        if ($result->num_rows != 0) {
            array_push($errors, "User already assigned to project");
        }
    }

    //carry out allocating user to project
    if (count($errors) == 0) {
        //query to add assignation
        $query = "INSERT INTO project_allocations (userID,projectID,role) VALUES ('$userID', '$projectID', '$role')";

        if (mysqli_query($conn, $query)) {
            echo ("Project Allocation Added");
            echo  nl2br("\n");
            //query to make sure user has correct reviewer/collab flags

            //get correct column to update
            $roleUpdate = $role == 0 ? "collab" : "reviewer";

            $query = "UPDATE users SET ". $roleUpdate ." = 1 WHERE userID ='$userID' ";

            echo  nl2br("\n");
            if (mysqli_query($conn, $query)) {
                //echo ("User Data Updated");
                //echo  nl2br("\n");
            } else {
                array_push($errors, 'Error updating user data');
            }
        } else {
            array_push($errors, 'Error updating database');
        }
    } else {
        foreach ($errors as $error) {
            echo  nl2br("\n") . $error;
            exit();
        }
    }
}
