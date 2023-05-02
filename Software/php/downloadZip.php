<?php


/**
 * Download a zip folder created by createZip
 * 
 * @param $zip The name of the zip folder to download 
 */
function downloadZip($zip){
/* //set header to force download*/
    header('Content-type: application/zip');
	header("Content-Disposition: attachment; filename=$zip");
	header("Content-length: " . filesize($zip));
	header("Pragma: no-cache");
	header("Expires: 0");

    //clean output buffer
    ob_clean();
	flush();

    //download zip file
    readfile($zip);
    unlink($zip);
    exit;

}