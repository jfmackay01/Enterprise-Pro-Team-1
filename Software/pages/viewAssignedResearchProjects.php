<?php
//connect to database
require_once '../db/dbconnect.php';
require_once '../php/showResearchProject.php';



if (isset($_SESSION["logon"])) {
    //set up SQL Query to select the project ID of allowed projects
    if ($_SESSION["admin"] == true) {


        $query = "SELECT * FROM research_project";
    } else {
        $userID = $_SESSION['userID'];
        $query = "SELECT * FROM research_project WHERE projectID IN (SELECT projectID FROM project_allocations WHERE userID =  '$userID' )";
    }
    //perform query

    //Add filter to query

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        if (isset($_GET["departmentFilter"])) {
            $filter = $_GET["departmentFilter"];
            if ($filter != "all") {

                if ($_SESSION["admin"] == true) {

                    $query = $query . " WHERE";
                } else {
                    $query = $query . " AND";
                }
                $query = $query . " departmentID = " . $filter;
            }
        }
    }




    //Add sort to query

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        if (isset($_GET["projectSort"])) {
            $sort = $_GET["projectSort"];

            if ($sort != "none"){
 

                $query = $query . " ORDER BY ". $sort;
            }

        }
    }



    $result = mysqli_query($conn, $query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $id = $row['projectID'];
            showResearchProject($id, $conn);
        }
    } else {
        echo ("You have no assigned research projects");
    }
} else {
    echo ("Logon to view assigned projects");
}


$conn->close();
