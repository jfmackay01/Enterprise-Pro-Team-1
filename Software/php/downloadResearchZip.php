<?php


require "../php/createZip.php";
require "../php/downloadZip.php";

//get files to download

$query = "SELECT rFileName FROM research_files WHERE projectID  = $projectID";

$result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {

        //Create array holding filenames for files to add to zip
        $fileArray = array();
        while ($record = mysqli_fetch_assoc($result)) {
            array_push($fileArray, $record['rFileName']);
        }

        //name for zip folder
        $zipFile = "researchProjectFiles.zip";


        //create the zip file
        $zip = createZip($fileArray,$zipFile);

        if (is_null($zip)){
            echo "Error Creating Zip file";
        }
        else{
            //download the zip file
            downloadZip($zipFile);
        }
    }
    else{
        echo "No Files to Zip";
    }