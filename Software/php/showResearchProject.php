<?php

/**
 *Show research project with given projectID
 *@param int $id  the projectID of the research project in the database
 *@param $conn the database connection

 */
function showResearchProject($projectID, $conn)
{

    //select all details corrensponding project ID from research_project and departments tables
    $query = "SELECT * FROM research_project NATURAL JOIN departments WHERE projectID = $projectID";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
        if ($project = mysqli_fetch_assoc($result)) {
            $projectTitle = $project['projectTitle'];
            $projectSummary = $project['projectSummary'];
            $projectInvestigator = $project['projectInvestigator'];
            $department = $project['departmentName'];

            //show item details in a table
            echo ("<tr>");
            echo nl2br("<td>" . $projectTitle . " </td>"); //show name
            //echo ('<br>');
            echo ('<td>' . $projectSummary . "</td>"); //show summary
            echo nl2br("<td>" . $projectInvestigator . "</td>");
            echo nl2br("<td>" . $department . "</td>");
           
           //show view Impact and Project Details buttons in table 
            echo ("<td> ");
            require("../php/viewImpactButton.php"); 
            echo("</td><td>");
            require("../php/projectDetailsButton.php");
            echo ("</td>");
            echo ("</tr>");
        }
    }
}
