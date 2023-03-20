<?php

/**
 *Show research project with given projectID
 *@param int $id  the projectID of the research project in the database
 *@param $conn the database connection

 */
function showResearchProject($projectID, $conn)
{

    //
    $query = "SELECT * FROM research_project NATURAL JOIN departments WHERE projectID = $projectID";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
        if ($project = mysqli_fetch_assoc($result)) {
            $projectTitle = $project['projectTitle'];
            $projectSummary = $project['projectSummary'];
            $projectInvestigator = $project['projectInvestigator'];
            $department = $project['departmentName'];

            //show item details in a table
            echo ("<table>");
            echo ("<tr>");
            echo nl2br("<td><h3>" . $projectTitle . " </h3></td>"); //show name
            //echo ('<br>');
            echo ('<td><h4> Summary: ' . $projectSummary . "."); //show summary
            echo ("</h3></td></tr>");

            echo ("<tr>");
            echo nl2br("<td>Project Investigator: " . $projectInvestigator . "&nbsp</td>&nbsp");
            echo nl2br("<td>Department: " . $department . "</td>");
            echo ("</tr>");
            
            echo ("</table>");
            require("../php/viewImpactButton.php");

        }
    }
}
