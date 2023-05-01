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
        $query = "SELECT * FROM users WHERE userID = $userID";
        $result = mysqli_query($conn, $query);

        if ($user = mysqli_fetch_assoc($result)) {
            //set details as local variables
            $email = $user["email"];

            echo nl2br("User ID: " . $userID . "\n");
            echo ("User Email: " . $email);
            if ($user['collab'] == 1) {
                echo ("<br>");
                echo ("Collaborator");
            }
            if ($user['reviewer'] == 1) {
                echo ("<br>");
                echo ("Reviewer");
            }
            echo ("<br>");



            if ($_SESSION['admin'] == true) {
                if (!$user['admin']) {
                    require('../php/assignToProjectButton.php');
                    require('../php/deleteUserButton.php');
                }
            }
            echo ("<br>");
            return $user;
        }
    }
    ?>
