<?php
    require '../db/dbconnect.php';
    

    $errors = array();

    if (isset($_POST)) {
        
        // Validate if all fields has been selected 
        if (!empty($_FILES['impFileUpload']['name'])) {

            //check if dropdown value is selected 
            if ($_POST['dropdown'] != '0') {

                //check if Impact Activity field is not empty 
                if(!empty('impactActivity') ) {

                    //check if Impact Evidence text field is not empty 
                    if(!empty('impactEvidence')) {

                        
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