<?php 

function uploadImpactFile($iFileName, $researchID, $conn) {

    //connection with database
    require '../db/dbconnect.php';

    $errors = array();
    //upload impact project form to database 
    if (isset($_POST)) { //only continue if form used POST method
        echo "inside uploadImpactFile";
        $file = $_FILES['impFileUpload'];
        $iFileName = $_FILES['impFileUpload']['name'];
        $fileSize = $_FILES['impFileUpload']['size'];
        $fileError= $_FILES['impFileUpload']['error'];

        $impactActivity = $_POST['impactActivity'];
        $impactEvidence = $_POST['impactEvidence'];
       
        echo "got all the variables";

        //variable for file extension
        $fileExt = explode('.', $iFileName);
        //making sure that extension is in lowercase letters
        $fileActualExt = strtolower(end($fileExt));

        //allowed extensions of files
        $allowed = array('jpg', 'jpeg', 'pdf', 'png', 'txt', 'docx', 'xml');

        if (!empty($iFileName)) {
            echo "   file not empty   ";
            //checking if right extension is uploaded
            if (in_array($fileActualExt, $allowed)){
                //error handling
                if ($fileError === 0) {
                    //max file size 50 mb 
                    if ($fileSize < 50000) {
                        echo "correct size  ";

                        $fileDestination = '../upload/';
                        $targetFilePath = $fileDestination . $iFileName;


                        //get project ID from selection bar
                        $query = "SELECT * FROM impact_record WHERE researchID = $researchID 
                        AND impactActivity = $impactActivity AND impactEvidence = $impactEvidence";
                         echo " impfile upload $file  imp activity $impactActivity  imp evidence $impactEvidence  ";
                        $result = mysqli_query ($conn, $query);
                        $check = mysqli_fetch_assoc($result);
                        echo "impact ID $impactID   ";
                        if (!$check) {
                            array_push($errors, "Error getting the project details");
                        }

                        echo " check done ";
                        if($result->num_rows >0) {
                            echo "showing the results  ";
                             
                            //upload file to database
                            if(move_uploaded_file($iFileName, $targetFilePath)) {
                                $insert = $db->$query("INSERT into impact_files(impactID, iFileName,) VALUES ('$impactID', '$iFileName')");
                        
                                if($insert) {
                                    echo "File uploaded sucessfully!";
                                } else {
                                    echo "File upload failed!";
                                }
                            }  else {
                                echo "There was an error uploading your file.";
                            }

                        }
                        else {
                            echo "This Impact Evidence doesn't exist.";
                        }
                    }
                    else {
                        "Your file is over the file size limit (max 500mb)";
                    }

                }
                else {
                    echo "You cannot upload files of this type!";
                }
            }
                
            else {
                echo "No files have been chosen.";
            }
        }
        else {
            echo ("Please select file.");
        }
    }
}


