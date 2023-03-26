<?php 

require '../db/dbconnect.php';
/*require '../php/fileUploadValidation.php';*/


//upload impact project form to database 
if (isset($_POST['Submit'])) { //only continue if form used POST method

    $file = $_FILES['impFileUpload'];
    $fileName = $_FILES['impFileUpload']['name'];
    $fileTmpName = $_FILES['impFileUpload']['tmp_name'];
    $fileSize = $_FILES['impFileUpload']['size'];
    $fileError= $_FILES['impFileUpload']['error'];
    $fileType = $_FILES['impFileUpload']['type'];

    //variable for file extension
    $fileExt = explode('.', $fileName);
    //making sure that extension is in lowercase letters
    $fileActualExt = strtolower(end($fileExt));

    //allowed extensions of files
    $allowed = array('jpg', 'jpeg', 'pdf', 'png', 'txt');

    if (!empty($fileName)) {
            
        //checking if right extension is uploaded
        if (in_array($fileActualExt, $allowed)){
            //error handling
            if ($fileError === 0) {
                //max file size 50 mb 
                if ($fileSize < 50000) {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = '../upload/';
                    $targetFilePath = $fileDestination . $fileNameNew;
                    
                    $query = "SELECT impactID FROM impact_record";
                    $result = mysqli_query ($conn, $query);

                    if($result->num_rows >0) {
                        $id = $row['impactID'];
                    
                        //upload file to database
                        if(move_uploaded_file($fileNameNew, $targetFilePath)) {
                            $insert = $db->$query("INSERT into impact_files(iFileName, impactID) VALUES ('$fileNameNew', '$id')");
                    
                    
                        
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


