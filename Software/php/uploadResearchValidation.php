<?php
ini_set ('error_reporting', E_ALL); ini_set ('display_errors', 1); ini_set ('display_startup_errors', 1);

function uploadResearchProject() {

    //connect to database
    require '../db/dbconnect.php';

    $errors = array();
    $noError = true;
  
    if (isset($_POST)) {    

        //get all variables from the template
        $projectTitle = $_POST['projectTitle'];
        $projectInvestigator = $_POST['projectInvestigator'];
        $grants_radio = $_POST['grants_radio'];
        $grants_dateGiven = $_POST['grants_dateGiven'];
        $grants_amount = $_POST['grants_amount'];
        $grants_givenBy = $_POST['grants_givenBy'];
        $faculty = $_POST['faculty'];
        $summaryOfResearch = $_POST['summaryOfResearch'];
        $researchOutput = $_POST['researchOutput'];
        $projectSummary = $_POST['projectSummary'];
        $UOA = $_POST['UOA'];
        $progress = $_POST['impactProgress'];
        $notes = $_POST['notes'];
        $meetings = $_POST['meetings'];
        $followUp = $_POST['followUp'];
        $underpinnedResearch = $_POST['underpinnedResearch'];
        $reach = $_POST['reach'];
        $significance = $_POST['projectSummary'];
        $quality = $_POST['quality'];
       
        //all text fields and all options must be filled/sellected
        if (empty($projectTitle)) {
            array_push($errors, "Project title is required");
            echo "<p>Project title is required</p>";
          }

        if (empty($projectInvestigator)) {
            array_push($errors, "Project investigator is required");
            echo "<p>Project investigator is required</p>";
        }
        
        if ($grants_radio == 0) {
            array_push($errors, "Grants details required");
            echo "<p>Grants details required</p>";
        }
        
        if ($grants_radio == 1) {
            if (strlen($grants_dateGiven) == 0) {
                array_push($errors, "Grant date details required");
                echo "<p> Grant date details required </p>";
                $noError = false;
            }

            if (empty($grants_amount)) {
                array_push($errors, "Grant amount details required");
                echo "<p> Grant amount details required</p>";
                $noError = false;
            }

            if (empty($grants_givenBy)) {
                array_push($errors, "Grant given by... details required");
                echo "<p> Grant given by details required</p>";
                $noError = false;
            }
     
            $noError = true;
            
        }

        if ($faculty == 0) {
            array_push($errors, "Select your faculty!");
            echo "<p>Select your faculty!</p>";
        }
        if ($progress == 0) {
            array_push($errors, "Select progress state!");
            echo "<p>Select progress state!<p/>";
        }
        if (empty($summaryOfResearch)) {
            array_push($errors, "Summary of Research is required");
            echo "<p>Summary of Research is required</p>";
        }
        if (empty($researchOutput)) {
            array_push($errors, "Research Output is required");
            echo "<p>Research Output is required</p>";
        }
        if (empty($projectSummary)) {
            array_push($errors, "Project summary is required");
            echo "<p>Project summary is required</p>";
        }
        if (empty($UOA)) {
            array_push($errors, "Potential UOA is required");
            echo "<p>Potential UOA is required</p>";
        }
        if (empty($notes)) {
            array_push($errors, "Notes are required");
            echo "<p>Notes are required</p>";
        }
        if (empty($meetings)) {
            array_push($errors, "Meetings are required");
            echo "<p>Meetings are required</p>";
        }
        if (empty($followUp)) {
            array_push($errors, "Follow up is required");
            echo "<p>Follow up is required</p>";
        }
        if (empty($underpinnedResearch)) {
            array_push($errors, "Underpinned research is required");
            echo "<p>Underpinned research is required</p>";
        }
        if (empty($reach)) {
            array_push($errors, "Reach is required");
            echo "<p>Reach is required</p>";
        }
        if (empty($significance)) {
            array_push($errors, "Significance is required");
            echo "<p>Significance is required</p>";
        }
        if (empty($quality)) {
            array_push($errors, "Quality is required");
            echo "<p>Quality is required</p>";
        }

        if (empty($_FILES['researchFileUpload']['name'])) {
            array_push($errors, "Please select a file");
            echo "<p>Please select file!</p>";
        }

         //if no errors add to database
        if (count($errors) == 0 && $noError) {
            
            //if selected yes on grants
            if ($grants_radio == 1) {
                //insert into table grants given values
                $sql = "INSERT INTO research_grant(amount, dateGiven, givenBy) VALUES ('$grants_amount', '$grants_dateGiven', '$grants_givenBy')";
                if(mysqli_query($conn, $sql)) {
                    echo "<p>Grant added succesfully!</p>";
                } else {
                    echo "Adding grant's details failed!";
                }
            }
            //get lastest inserted id for grant id 
            if ($grants_radio == 1) {
                $grantID = mysqli_insert_id($conn);
            } 

            //get faculty id
            $query = "SELECT * FROM departments WHERE departmentID = $faculty";
            $result = mysqli_query ($conn, $query);
            $check = mysqli_fetch_assoc($result);
            if (!$check) {
                array_push($errors, "Error getting the faculty details");
            }
             
            //get UOA id
            $query = "SELECT * FROM uoa WHERE uoaID = $UOA";
            $result = mysqli_query ($conn, $query);
            $check = mysqli_fetch_assoc($result);
            if (!$check) {
                array_push($errors, "Error getting the UOA details");
            }

             //get progress id
             $query = "SELECT * FROM progress WHERE progressID = $progress";
             $result = mysqli_query ($conn, $query);
             $check = mysqli_fetch_assoc($result);
             if (!$check) {
                 array_push($errors, "Error getting the progress details");
             }
             // if there is no errors
            if (count($errors) == 0) {
                if ($grants_radio == 1) {
                    //sql statement to add data to research_project table, if selected yes on grant details
                    $query = "INSERT INTO research_project (projectTitle, departmentID, projectInvestigator, 
                    grantID, researchOutput, projectSummary, potentialUOA, impactProgress, notes, meetings, 
                    followup, underpinnedResearch, reach, significance, quality) VALUES ('$projectTitle', 
                    '$faculty', '$projectInvestigator', '$grantID', '$researchOutput', '$projectSummary',
                    '$UOA','$progress', '$notes', '$meetings', '$followUp', '$underpinnedResearch','$reach',
                    '$significance', '$quality')";


                    if (mysqli_query($conn, $query)) {
                        //Research Project added sucessfully
                        echo ("<p> Research Project added!</p>");

                      //get Impact ID as last inserted ID into database
                        $projectID = mysqli_insert_id($conn);

                        if ($projectID !=0 ) {
                            require_once '../php/uploadResearchFile.php';
                            uploadResearchFile($projectID, $_FILES['researchFileUpload'], $conn);
                        } else {
                            echo "<br> Error adding the file";
                        }
                        

                    }
                    else {
                        echo "Error adding the Research Project";
                    }

                } elseif ($grants_radio != 1){
                    //sql statement to add data to research_project table, if selected no on grant details

                    $query = "INSERT INTO research_project (projectTitle, departmentID, projectInvestigator, 
                    grantID, researchOutput, projectSummary, potentialUOA, impactProgress, notes, meetings, 
                    followup, underpinnedResearch, reach, significance, quality) VALUES ('$projectTitle', 
                    '$faculty', '$projectInvestigator', NULL, '$researchOutput', '$projectSummary',
                    '$UOA','$progress', '$notes', '$meetings', '$followUp', '$underpinnedResearch','$reach',
                    '$significance', '$quality')";
                    
                    if (mysqli_query($conn, $query)) {
                        //Research Project added sucessfully
                        echo ("<p> Research Project added!</p>");
                        //get Impact ID as last inserted ID into database
                        $projectID = mysqli_insert_id($conn);

                        if ($projectID !=0 ) {
                            require_once '../php/uploadResearchFile.php';
                            uploadResearchFile($projectID, $_FILES['researchFileUpload'], $conn);
                        } else {
                            echo "<br> Error adding the file";
                        }
                    }
                    else {
                        echo "Error adding the Research Project";
                    } 
                }

            }

        }
    }
}
        