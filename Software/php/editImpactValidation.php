<?php 

function editImpact($id, $conn) {
    
    //connect to database
    require '../db/dbconnect.php';
    $impactActivity = $_POST['impactActivity'];
    $impactEvidence = $_POST['impactEvidence'];

    $errors = array();
    
    if (isset($_POST)) { //continue if used method is post
    
        if(empty($impactActivity)) { //impact Activity can't be empty
            array_push($errors, "Please insert text into Impact Activity area.");
            echo "<p>Please insert text into Impact Activity area.</p>";
        }

        if(empty($impactEvidence)) { //impactEvidence can't be empty
            array_push($errors, "Please insert text into Impact Activity area.");
            echo "<p>Please insert text into Impact Evidence area.</p>";
        }
        
        //conduct update if no errors
        if (count($errors) == 0 && $id != 0) {
            //update table with given values
            $query = "UPDATE impact_record SET impactActivity='$impactActivity', impactEvidence='$impactEvidence' WHERE impactID='$id'";

            if (mysqli_query($conn, $query)) { //output successful message
                echo ("Impact Project Updated");
            } else {
                echo ("Error updating the Impact Project");
            }
        }

    }       

}