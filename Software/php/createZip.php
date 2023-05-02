<?php
/**
 * Creates a zip file to be later downloaded
 * 
 * @param $files array of files to add to zip file
 * 
 * @param $zipName name of the zip file
 */
function createZip($files = array(), $zipName = '')
{

    //set up zip file
    $zip = new ZipArchive();
    if ($zip->open($zipName, ZipArchive::CREATE) !== TRUE) {
        echo ("Error Opening Zip File");
        return null;
    } else {
        echo ("Zip Opened");
        echo count($files);

        //add files to zip
        foreach ($files as $file) {
          echo $file;
            $zip->addFile("../php/uploads/" . $file, $file);

        }

        //close zip file
        $zip->close();
        return $zip;
    }
}
