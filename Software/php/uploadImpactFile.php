<?php 
 ini_set ('error_reporting', E_ALL); ini_set ('display_errors', 1); ini_set ('display_startup_errors', 1);

function uploadImpactFile($impID, $iFileName, $researchID, $conn) {

    //connection with database
    require '../db/dbconnect.php';

    $errors = array();
    //upload impact project form to database 
    if (isset($_POST)) { //only continue if form used POST method
    
        $file = $_FILES['impFileUpload'];
        $iFileName = basename($_FILES['impFileUpload']['name']);
        $fileTmpName = $_FILES['impFileUpload']['tmp_name'];
        $fileSize = $_FILES['impFileUpload']['size'];
        $fileError= $_FILES['impFileUpload']['error'];
        $isValidFile = true;

        //variable for file extension
        $fileExt = explode('.', $iFileName);
        //making sure that extension is in lowercase letters
        $fileActualExt = strtolower(end($fileExt));

        //allowed extensions of files
        $allowed = array('jpg', 'jpeg', 'pdf', 'png', 'txt', 'docx', 'ppt', 'xls', 'doc');

        if (!empty($iFileName)) {
            //checking if right extension is uploaded
            if (in_array($fileActualExt, $allowed)){
                //error handling
                if ($fileError === 0) {
                    //max file size 80 mb 
                    if ($fileSize < 80000) {

                        //check if file with the same name exists in database
                        $sql = mysqli_query($conn, "SELECT * FROM impact_files WHERE iFileName = '$iFileName'");
                        
                        //generate random number between 1 and 1000
                        $i = rand(1, 1000);
                        //if file exists, then append random number to the file name
                        if ($sql->num_rows >0) {
                            list($name, $ext) = explode ('.', $iFileName);
                            $iFileName = $name. $i . '.' . $ext;
                        }

                        // path to the destination file
                        $fileDestination = '../php/uploads/';

                        $targetFilePath = $fileDestination . $iFileName;

                        //if there is no errors, file is valid and tmp 
                        if(count($errors) == 0  && $isValidFile && is_uploaded_file($fileTmpName)) {

                            //upload file to database
                            if(move_uploaded_file($fileTmpName, $targetFilePath)) {
                            
                                $sql="INSERT into impact_files(impactID, iFileName) VALUES ('$impID', '$iFileName')";
                        
                                
                                if(mysqli_query($conn, $sql)) {
                                    echo "File uploaded sucessfully!";
                                } else {
                                    echo "File upload failed!";
                                }
                            }
                            else {
                                echo "There was an error uploading your file.";
                            }
                        
                        }
                        else {
                            echo "Error adding the file!";
                        }
                    }
                    else {
                        echo "Your file is over the file size limit (max 80mb)";
                        $isValidFile = false;
                    }

                }
                else {
                    echo "You cannot upload files of this type!";
                    $isValidFile = false;
                }
            }
                
            else {
                echo ("No files have been chosen.");
                $isValidFile = false;
            }
        }
        else {
            echo ("Please select file.");
            $isValidFile = false;
        }
    }
}


