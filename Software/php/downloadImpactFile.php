<?php 
//connect to database
require '../db/dbconnect.php';
//get file name from url
$FileNo=$_GET['iFileName'];
// select file from database
$query = "SELECT iFileName FROM impact_files WHERE iFileName = '$FileNo'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_object($result);
  $path= $row->iFileName; //holds value of selected file from database

  //full path to the folder with file
  $filePaths = '../php/uploads/'.$path;

//call to function with selected function 
download_file($filePaths);

function download_file( $fullPath )
{
  //checks if header was sent
  if( headers_sent() )
    die('Headers Sent');

  // get configuration option
  if(ini_get('zlib.output_compression'))
    ini_set('zlib.output_compression', 'Off');

  //checks file or directory exists
  if( file_exists($fullPath) )
  {

    $fsize = filesize($fullPath);  //gets file size
    $path_parts = pathinfo($fullPath); //gets file path
    $ext = strtolower($path_parts["extension"]); //make extension lowercase

    //choosing proper file extension
    switch ($ext) 
    {
      case "pdf": $ctype="application/pdf"; break;
      case "doc": $ctype="application/msword"; break;
      case "docx": $ctype="application/vnd.openxmlformats-officedocument.wordprocessingml.document"; break;
      case "xls": $ctype="application/vnd.ms-excel"; break;
      case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
      case "png": $ctype="image/png"; break;
      case "jpeg":
      case "jpg": $ctype="image/jpg"; break;
      case "txt": $ctype="text/plain"; break;
      default: $ctype="application/force-download"; //force download
    }

    //sends raw HTTP header
    header("Pragma: public"); 
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false); 
    header("Content-Type: $ctype");
    header("Content-Disposition: attachment; filename=\"".basename($fullPath)."\";" );
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".$fsize);
    ob_clean();
    flush();  //flush system output buffer
    readfile( $fullPath );  //outputs file

  } 
  else
    die('File Not Found');

}