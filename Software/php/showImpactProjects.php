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
            echo "<tr>";
            echo "<td>" . $recordName . "</td>"; //show name
            echo "<td>". $evidence . ".</td>"; //show summary
            echo "</tr>";
           


        }
    }
    else{
        echo("No Impact Projects");
    }
 
}