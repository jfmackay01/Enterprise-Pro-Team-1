<?php 
 ini_set ('error_reporting', E_ALL); ini_set ('display_errors', 1); ini_set ('display_startup_errors', 1);

function uploadResearchFile($projectID, $rFileName, $conn) {

    //connection with database
    require '../db/dbconnect.php';
    $errors = array();
   
    if (isset($_POST)) { //only continue if form used POST method
        
        $file = $_FILES['researchFileUpload'];
        $rFileName = basename($_FILES['researchFileUpload']['name']);
        $fileTmpName = $_FILES['researchFileUpload']['tmp_name'];
        $fileSize = $_FILES['researchFileUpload']['size'];
        $fileError= $_FILES['researchFileUpload']['error'];
        $isValidFile = true;

        //variable for file extension
        $fileExt = explode('.', $rFileName);
        //making sure that extension is in lowercase letters
        $fileActualExt = strtolower(end($fileExt));
       
        //allowed extensions of files
        $allowed = array('jpg', 'jpeg', 'pdf', 'png', 'txt', 'docx', 'xml');

        if (!empty($rFileName)) {
         
            //checking if right extension is uploaded
            if (in_array($fileActualExt, $allowed)){
                //error handling
                if ($fileError === 0) {
            
                    //max file size 80 mb 
                    if ($fileSize < 80000) {

                        //check if file with the same name exists in database
                        $sql = mysqli_query($conn, "SELECT * FROM research_files WHERE rFileName = '$rFileName'");
                        
                        //generate random number between 1 and 1000
                        $i = rand(1, 1000);
                        //if file exists, then append random number to the file name
                        if ($sql->num_rows >0) {
                            list($name, $ext) = explode ('.', $rFileName);
                            $rFileName = $name. $i . '.' . $ext;
                        }

                        //whole path to the destination file
                        $fileDestination = $_SERVER['DOCUMENT_ROOT'].'/Software/php/uploads/';
                        $targetFilePath = $fileDestination . $rFileName;
                   
                        //if there is no errors, file is valid and tmp 
                        if(count($errors) == 0  && $isValidFile && is_uploaded_file($fileTmpName)) {
                  
                            //upload file to database
                            if(move_uploaded_file($fileTmpName, $targetFilePath)) {
                       
                                $sql="INSERT into research_files(projectID, rFileName) VALUES ('$projectID', '$rFileName')";
                         
                                if(mysqli_query($conn, $sql)) {
                                    echo "  File uploaded sucessfully!";
                                } else {
                                    echo "File upload failed!";
                                }
                            }  else {
                                echo "There was an error uploading your file.";
                            }
                            
                        }
                        else {
                            echo "This Research Project doesn't exist.";
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


