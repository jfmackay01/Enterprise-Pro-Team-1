<?php

    
    //connect to database
    require '../db/dbconnect.php';
    require'../php/showUser.php';
    //set up SQL Query to select the userID of all collaborators
    $query = "SELECT userID FROM USERS WHERE collab = 1";

    //perform query
    $result = mysqli_query($conn, $query);

    if ($result->num_rows > 0) { 
        
        while ($row = $result->fetch_assoc()){
            $id = $row['userID'];
            showUser($id, $conn);
        }

    }

    $conn -> close();
?>