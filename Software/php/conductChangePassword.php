<?php

function conductChangePassword($userID, $oldPass, $newPass)
{

    //both arguments must not be empty
    if(empty($oldPass) || empty($newPass)){
        echo("Fields must be filled out");
        return;
    }

    //make sure connected to database
    require '../db/dbconnect.php';

    //Check old password matches
    $query = "SELECT password FROM users WHERE userID = '$userID' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $check = mysqli_fetch_assoc($result);
    if ($check) {
        $hash = $check['password']; //hash the password
        if (password_verify($oldPass, $hash)) {
            echo 'Password verified';
            $options = ['cost' => 12];
            $hashPass = password_hash($newPass, PASSWORD_BCRYPT, $options);


            //update password
            $query = "UPDATE users SET password = '$hashPass' WHERE userID ='$userID' ";
            if (mysqli_query($conn, $query)) {
                echo  nl2br("\n");
                echo ("Password Changed Successfully");
                
            }
        } else {
            echo 'Incorrect Password';
        }            //hash new password
            
    } else {
        echo 'Error Accessing Database';
        return;
    }
}
