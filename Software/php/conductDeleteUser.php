<?php
    require_once("../db/dbconnect.php");

    //get user id
    $userID = $_POST['userID'];
    //set up error array
    $errors = array();
    //unassign user from all projects

    $query = "DELETE FROM project_allocations WHERE userID = $userID";
    echo( $query);

    $result = mysqli_query($conn, $query);

    if ($result){
        //delete user from users

        $query = "DELETE FROM users WHERE userID = $userID";

        echo $query;


        $result = mysqli_query($conn, $query);

        if ($result){
            echo"yay";
        }
        else{
            array_push($errors,"Error deleting user");
        }

    }
    else{
        array($errors, "Error unassigning user");
    }

    if (count($errors) != 0) {
        echo ("Errors Found: ");
        foreach ($errors as $error) {
            echo  nl2br("\n") . $error;
        }
    }
    else{
        echo("User successfully deleted");
    }




?>