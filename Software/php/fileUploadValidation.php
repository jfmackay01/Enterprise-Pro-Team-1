<?php

    $errors = array();

    if (isset($_POST['Submit'])) {
        
        // Validate if all fields has been selected 
        if (!empty($_FILES['impFileUpload']['name'])) {

            //check if dropdown value is selected 
            if ($_POST['dropdown'] != '0') {

                //check if Impact Activity field is not empty 
                if(!empty('impactActivity') ) {

                    //check if Impact Evidence text field is not empty 
                    if(!empty('impactEvidence')) {
                        
                        $impactActivity = $_POST['impactActivity'];
                        $impactEvidence = $_POST['impactEvidence'];
                        getImpactID ($resID, $conn);

                        require_once '../php/uploadImpactFile.php';

                        $query = "INSERT INTO impact_record (impactActivity, impactEvidence, researchID) VALUES ('$impactActivity', '$impactEvidence ', '$resID')";

                        if (mysqli_query($conn, $query)) {
                            echo ("Project Allocation Added");
                        
                        } else {
                            echo "Please insert text into Impact Evidence text field!";
                        }
                    
                    } else {
                        echo ("Please insert text into Impact Activity text field!");
                    }

                } else {
                    echo ("Please select your project!");
                }

            } else {
                echo ("Please select file.");
            }
        }
    }

    function getImpactID($id, $conn) {

        //get project ID from selection bar
        $query = "SELECT impactID, researchID FROM impact_records WHERE impactID =
        (SELECT projectID FROM research_project WHERE projectID = $id)";

        $result = mysqli_query ($conn, $query);
        $check = mysqli_fetch_assoc($result);

        if (!$check) {
            array_push($errors, "Error getting the project details");
        }
    }