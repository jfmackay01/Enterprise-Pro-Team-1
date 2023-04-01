<?php 

require '../db/dbconnect.php';
/*require '../php/fileUploadValidation.php';*/

$errors = array();
//upload impact project form to database 
if (isset($_POST)) { //only continue if form used POST method

    $file = $_FILES['impFileUpload'];
    $fileName = $_FILES['impFileUpload']['name'];
    $fileTmpName = $_FILES['impFileUpload']['tmp_name'];
    $fileSize = $_FILES['impFileUpload']['size'];
    $fileError= $_FILES['impFileUpload']['error'];
    $fileType = $_FILES['impFileUpload']['type'];
    
    $impactID = $_POST['project']['project_ID'];

    //variable for file extension
    $fileExt = explode('.', $fileName);
    //making sure that extension is in lowercase letters
    $fileActualExt = strtolower(end($fileExt));

    //allowed extensions of files
    $allowed = array('jpg', 'jpeg', 'pdf', 'png', 'txt', 'docx', 'xml');

    if (!empty($fileName)) {
            
        //checking if right extension is uploaded
        if (in_array($fileActualExt, $allowed)){
            //error handling
            if ($fileError === 0) {
                //max file size 50 mb 
                if ($fileSize < 50000) {
                    
                    $fileDestination = '../upload/';
                    $targetFilePath = $fileDestination . $fileName;

                    //get project ID from selection bar
                    $query = "SELECT impactID FROM impact_records WHERE researchID IN
                    (SELECT projectID FROM research_project WHERE projectID = $id)";
                    
                    $result = mysqli_query ($conn, $query);
                    $check = mysqli_fetch_assoc($result);

                    if (!$check) {
                        array_push($errors, "Error getting the project details");
                    }

                    if($result->num_rows >0) {
                    
                        //upload file to database
                        if(move_uploaded_file($fileName, $targetFilePath)) {
                            $insert = $db->$query("INSERT into impact_files(iFileName, impactID) VALUES ('$fileName', '$id')");
                    
                        
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
                        echo "Your file is over the file size limit (max 500mb)!";
                    }
                }
                else {
                    "There was an error with uploading your file!";
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


