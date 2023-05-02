<?php


require "../php/createZip.php";
require "../php/downloadZip.php";

//get files to download

$query = "SELECT iFileName FROM impact_files WHERE impactID IN (SELECT impactID FROM impact_record WHERE researchID = ". $projectID.")";

$result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {

        //Create array holding filenames for files to add to zip
        $fileArray = array();
        while ($record = mysqli_fetch_assoc($result)) {
            array_push($fileArray, $record['iFileName']);
        }

        //name for zip folder
        $zipFile = "impactRecordFiles.zip";

        //create the zip file
        $zip = createZip($fileArray,$zipFile);

        if (is_null($zip)){
            echo "Error creating Zip File";
        }
        else{
            //download the zip file
            downloadZip($zipFile);
        }
    }
    else{
        echo "No Files to Zip";
    }