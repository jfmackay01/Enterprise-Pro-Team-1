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

    //show all impact records from 1 research project
    $query = "SELECT * FROM impact_record NATURAL LEFT JOIN impact_files WHERE researchID = $id";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
        while ($record = mysqli_fetch_assoc($result)) {
            $recordName = $record['impactActivity'];
            $evidence = $record['ImpactEvidence'];
            $iFileName = $record['iFileName'];

            //show item details in a table
            echo "<tr>";
            echo "<td>" . $recordName . "</td>"; //show name
            echo "<td>". $evidence . "</td>"; //show summary
            if ($iFileName == NULL) {
                echo "<td>  </td>";
            }
            else {
                echo "<td><a href='../php/downloadImpactFile.php?iFileName=".$iFileName."'>". $iFileName . "</a> </td>"; //show file
            }   
            echo "</tr>";

        }
    }
    else{
        echo("No Impact Projects");
    }
 
}