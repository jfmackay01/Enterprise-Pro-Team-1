<?php
require '../db/dbconnect.php';
//set array to hold errors
$errors = array();
if (isset($_POST)) {//only continue if form used POST method
    //ensure email and password are of correct form for SQL queries
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //check if email and password filled out
    if (empty($email)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {//if no errors

        //select from database with matching email
        $nameQuery = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $nameQuery);
        $user = mysqli_fetch_assoc($result);
        if ($user) {//if user with same email found check password matches
            $password = md5($password);
            $passwordQuery = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($conn, $passwordQuery);
            $user = mysqli_fetch_assoc($result);
            if ($user) {

                //Logon the user, setting session variables
                $_SESSION["logon"] = true;
                $_SESSION['email'] = $email; //may not need,
                $_SESSION['userID'] = $user['userID'];

                //check user roles
                if($user["admin"] == 1){
                    $_SESSION["admin"] = true;
                }
                else{
                    $_SESSION["admin"] = false;
                }
                if($user["collab"] == 1){
                    $_SESSION["collab"] = true;
                }
                else{
                    $_SESSION["collab"] = false;
                }
                if($user["reviewer"] == 1){
                    $_SESSION["reviewer"] = true;
                }
                else{
                    $_SESSION["reviewer"] = false;
                }


                header('location: ../pages/home.php');
            } else {
                array_push($errors, "Incorrect Password");
            }
        } else {
            array_push($errors, "User not Found");
        }
    }
    if (count($errors) != 0) {
        echo ("Errors Found: ");
        foreach ($errors as $error) {
            echo  nl2br("\n") . $error;
        }
    }
}

$conn->close(); //closing the connection
