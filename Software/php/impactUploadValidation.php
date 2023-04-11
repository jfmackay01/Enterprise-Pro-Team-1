<?php

function uploadImpactRecord( $impactActivity, $impactEvidence, $researchID, $conn) {
    //connect to database
    require '../db/dbconnect.php';

    $errors = array();
  
    if (isset($_POST)) {
        
        // Validate if all fields has been selected 
        if (!empty($_FILES['impFileUpload']['name'])) {

            //check if dropdown value is selected 
            if ($_POST['project'] != '0') {
                
                //check if Impact Activity field is not empty 
                if(!empty($_POST['impactActivity']) ) {
                   
                    //check if Impact Evidence text field is not empty 
                    if(!empty($_POST['impactEvidence'])) {
                        
                        //selecting the research project from database
                        $query = "SELECT * FROM impact_record WHERE researchID = $researchID";
                        $result = mysqli_query ($conn, $query);
                        $check = mysqli_fetch_assoc($result);
                        if (!$check) {
                            array_push($errors, "Error getting the impact evidence details");
                        }
                       

                        if (count($errors) ==0) {
                           
                            //insert given values to the database
                            $query = "INSERT INTO impact_record (impactActivity, impactEvidence, researchID) VALUES ('$impactActivity', '$impactEvidence ', '$researchID')";
                            
                            if (mysqli_query($conn, $query)) {
                                //Impact evidence added sucessfully
                                echo ("<br> Impact Evidence added!");

                                //get Impact ID as last inserted ID into database
                                $impactID = mysqli_insert_id($conn);
                                
                                //add file to database
                                if ($impactID != 0) {
                                    require_once '../php/uploadImpactFile.php';
                                    uploadImpactFile($impactID, $_FILES['impFileUpload'], $_POST['project'], $conn);
                                } else {
                                    echo "<br> Error adding the file";
                                }
                                
                
                            } else {
                                echo "Error adding the Impact Evidence";
                            }
                        }
                        
                    
                    } else {
                        echo ("Please insert text into Impact Evidence text field!");
                    }

                } else {
                    echo ("Please insert text into Impact Activity area.");
                }

            } else {
                echo ("Please select your project!");
            }
        }
        else {
            echo "Please select file.";
        }

    }
}
