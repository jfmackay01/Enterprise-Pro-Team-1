<?php

require '../db/dbconnect.php';

if (isset($_REQUEST['createzip'])) {
    extract($_REQUEST); //import variables
    $filename = 'files.zip'; //name of zip file
    //$projectID = $_POST['project']; //get projectID from previous page
    //$query = "SELECT * FROM impact_record NATURAL LEFT JOIN impact_files WHERE researchID = ?";
    $zip = new ZipArchive(); //load zip library
  
    /*$stmt = $conn->prepare($query);
    $stmt->bind_param("i", $projectID);
    $stmt->execute();
    $result = $stmt->get_result();  */
    $files_to_zip = array( 
        $_SERVER['DOCUMENT_ROOT'].'/Software/php/uploads/testing1.txt',
        $_SERVER['DOCUMENT_ROOT'].'/Software/php/uploads/BaronessLockwoodScholarship.docx',
    );

    $result = create_zip($files_to_zip,'impactFiles.zip');
}
    
function create_zip($files = array(),$destination = '') {
    //if the zip file already exists and overwrite is false, return false
    if(file_exists($destination)) { return false; }
    //vars
    $valid_files = array();
    //if files were passed in...
    if(is_array($files)) {
        //cycle through each file
        foreach($files as $file) {
            //make sure the file exists
            if(file_exists($file)) {
                $valid_files[] = $file;
            }
        }
    }
    
    if(count($valid_files)) {
        //create the archive
        $zip = new ZipArchive();
        if($zip->open($destination, ZIPARCHIVE::CREATE) !== true) {
            return false;
        }
        //add the files
        foreach($valid_files as $file) {
            $zip->addFile($file,$file);
        }
        $zip->close();

    }

        /*$destination = $_SERVER['DOCUMENT_ROOT'].'/Software/php/uploads/testing1.txt';

        if ($result->num_rows > 0) { 
           
            while ($row = $result->fetch_assoc()){
                $zip->addFile($destination.$row['iFileName'], $row['iFileName']);
            //}
            $zip->close();
            
        }*/
   
        // push to download the zip
        header("Content-type: application/zip"); 
        header("Content-Disposition: attachment; filename=$destination");
        header("Pragma: no-cache"); 
        header("Expires: 0"); 
        ob_clean();
        readfile($destination); 
        unlink($destination); // remove zip file if it exists in temp path
        
}

    
 
