<?php

/**
 *Show impact projects for given research project
 *@param int $id  the projectID of the research project in the database
 *@param $conn the database connection
 *
 *
 */
function showImpactProjects($id, $conn)
{

    
    $query = "SELECT * FROM impact_record WHERE researchID = $id";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
        while ($record = mysqli_fetch_assoc($result)) {
            $recordName = $record['impactActivity'];
            $evidence = $record['ImpactEvidence'];


            //show item details in a table
            echo ("<table>");
            echo ("<tr>");
            echo nl2br("<td><h3>" . $recordName . " </h3></td>"); //show name
            //echo ('<br>');
            echo ('<td><h4> &nbsp Evidence: ' . $evidence . "."); //show summary
            echo ("</h3></td></tr>");
            echo ("</table>");


        }
    }
    else{
        echo("No Impact Projects");
    }
}