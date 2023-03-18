<?php

/**
 *Show user with given userID
 *@param int $id  the userID of the user in the database
 *@param $conn the database connection
 *
 *@return $user the details of the user
 */
function showUser($userID, $conn)
{
    $query = "SELECT email FROM users WHERE userID = $userID";
    $result = mysqli_query($conn, $query);

    if ($user = mysqli_fetch_assoc($result)) {
        //set details as local variables
        $email = $user["email"];

        echo nl2br("User ID: " . $userID . "\n");
        echo ("User Email: " . $email);
        echo ("<br>");
    }
    if ($_SESSION['admin'] == true) {
        require('../php/assignToProjectButton.php');
    }
    return $user;
}
