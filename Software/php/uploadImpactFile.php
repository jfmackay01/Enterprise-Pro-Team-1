<?php 

function uploadImpactFile($impID, $iFileName, $researchID, $conn) {

    //connection with database
    require '../db/dbconnect.php';

    $errors = array();
    //upload impact project form to database 
    if (isset($_POST)) { //only continue if form used POST method
    
        $file = $_FILES['impFileUpload'];
        $iFileName = $_FILES['impFileUpload']['name'];
        $fileTmpName = $_FILES['impFileUpload']['tmp_name'];
        $fileSize = $_FILES['impFileUpload']['size'];
        $fileError= $_FILES['impFileUpload']['error'];

        $isValidFile = true;

        //variable for file extension
        $fileExt = explode('.', $iFileName);
        //making sure that extension is in lowercase letters
        $fileActualExt = strtolower(end($fileExt));

        //allowed extensions of files
        $allowed = array('jpg', 'jpeg', 'pdf', 'png', 'txt', 'docx', 'xml');

        if (!empty($iFileName)) {
            //checking if right extension is uploaded
            if (in_array($fileActualExt, $allowed)){
                //error handling
                if ($fileError === 0) {
                    //max file size 50 mb 
                    if ($fileSize < 50000) {

                        //whole path to the destination file
                        $fileDestination = '../upload/';
                        $targetFilePath = $fileDestination . $iFileName;

                        if(count($errors) == 0  && $isValidFile) {
                            echo "  showing the results +  $impID +  $fileTmpName    +   $targetFilePath    " ;

                            //upload file to database
                            if(move_uploaded_file($fileTmpName, $targetFilePath)) {

                                $sql="INSERT into impact_files(impactID, iFileName,) VALUES ('$impID', '$iFileName')";
                                
                                if(mysqli_query($conn, $sql)) {
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
                        echo "Your file is over the file size limit (max 500mb)";
                        $isValidFile = false;
                    }

                }
                else {
                    echo "You cannot upload files of this type!";
                    $isValidFile = false;
                }
            }
                
            else {
                echo "No files have been chosen.";
                $isValidFile = false;
            }
        }
        else {
            echo ("Please select file.");
            $isValidFile = false;
        }
    }
}


