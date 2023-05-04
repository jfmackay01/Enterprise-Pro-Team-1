<?php
session_start();
?>

<!DOCTYPE HTML>
<html>

<head>
<!-- Standard Page Header -->
    <?php
    require 'header.php';
    ?>   

</head>

<body>  
<!-- containter for form -->
    <div class="container4">
            <!-- back button -->
            <a class="back-btn" href="projects.php" >Back</a>
            <h2>Upload Research Project</h2>
        </div>

        <section>
        <div class="container-fluid2">
            <div class="container">
                <div class="formBox">
                    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="row">
                            <h3>Associated Project</h3>
                            <br><br>
                            <div class="row">
                                <div class="col-sm-6">
                                <!--project title text field -->
                                    <div class="inputBox">
                                        <br>
                                        <div class="inputText">Project Title</div>
                                        <input type="text" name="projectTitle" class="input" placeholder >
                                     </div>
                                </div>
                            
                                 <!-- PI text field -->
                                <div class="col-sm-6">
                                    <div class="inputBox">
                                        <br>
                                        <div class="inputText">Project Investigator</div>
                                        <input type="text" name="projectInvestigator" class="input">
                                    </div>
                                </div>
                                
                                <!-- associated grants -->
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Associated Grants </div>
                                        <br>
                                        
                                            <!-- yes or no buttons for associated grants -->
                                            <input type="hidden" name="grants_radio" value="0">
                                            <input type="radio" name="grants_radio" value="1" id="grants_radio1" onclick="showGrants(1)"/> Yes <br>
                                            <input type="radio" name="grants_radio" value="2" id="grants_radio2" onclick="showGrants(2)"/> No <br>
                                            <br>
                                            <!-- displaying the form after clicking on YES button -->
                                            <div id="grants_radio1Div" class="grants" style="display:none;"> 
                                                <div class="inputText">Date given: </div>
                                                <input type="date" name="grants_dateGiven" class="input">
                                                <input type="text" name="grants_amount" class="input" placeholder="Amount...">
                                                <input type="text" name="grants_givenBy" class="input"placeholder="Given by...">
                                            </div>

                                      
                                    </div>
                                </div>
                            
                                 <!-- faculty selection -->
                                <div>

                                    <input type='hidden' name='userID' value='<?php echo $userID ?>'>
                                
                                    <?php
                                    //drop down menu for faculty selection
                                    require("../php/facultyDropDown.php");    
                               
                                    ?>
                                </div>
                                <br>
                                <br>
                                <!-- summary of research text field 
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText" >Summary of Research</div>
                                        <textarea class="input" name ="summaryOfResearch"></textarea> 
                                    </div>
                                </div>-->
                                
                                <!-- research output text area -->
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <br>
                                        <div class="inputText">Research Output</div>
                                        <br>
                                        <textarea class="input" name ="researchOutput"></textarea> 
                                    </div>
                                </div>
                                 <!-- project summary text area -->
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <br>
                                        <div class="inputText" >Project summary</div>
                                        <br>
                                        <textarea class="input" name="projectSummary"></textarea> 
                                    </div>
                                </div>
                                <!-- Potential UOA-->
                                <div>  
                                    <input type='hidden' name='userID' value='<?php echo $_SESSION['admin'] ?>'>
                                
                                    <?php
                                    //drop down menu for UOA selection
                                    require("../php/UOAdropdown.php");    
                            
                                    ?>
                                </div>
                                <div>  
                                    <input type='hidden' name='userID' value='<?php echo $_SESSION['admin'] ?>'>
                                
                                    <?php
                                    //drop down menu for UOA selection
                                    require("../php/progressDropDown.php");    
                            
                                    ?>
                                </div>
                            
                                <!-- notes text area -->
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <br>
                                        <div class="inputText">Notes</div>
                                        <br>
                                        <textarea class="input" name="notes"></textarea> 
                                    </div>
                                </div>
                                <!-- Meetings text area -->
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <br>
                                        <div class="inputText">Meetings</div>
                                        <br>
                                        <textarea class="input" name="meetings"></textarea> 
                                    </div>
                                </div>
                                <!-- Follow up text area -->
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <br>
                                        <div class="inputText">Follow up</div>
                                        <br>
                                        <textarea class="input" name="followUp"></textarea> 
                                    </div>
                                </div>
                                <!-- underpinnedResearch text field -->
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <br>
                                        <div class="inputText">Underpinned Research</div>
                                        <br>
                                        <textarea class="input" name="underpinnedResearch"></textarea> 
                                    </div>
                                </div>
                                <!-- reach text field-->
                                <div class="col-sm-4">
                                    <div class="inputBox">
                                        <div class="inputText">Reach</div>
                                        <input type="text" name="reach" class="input">
                                    </div>
                                </div>

                                <!-- significance text field-->
                                <div class="col-sm-4">
                                    <div class="inputBox">
                                    <div class="inputText">Significance</div>
                                        <input type="text" name="significance" class="input">
                                    </div>
                                </div>

                                <!-- quality text field-->
                                <div class="col-sm-4">
                                    <div class="inputBox">
                                    <div class="inputText">Quality</div>
                                        <input type="text" name="quality" class="input">
                                    </div>
                                </div>
                                 <!-- Impact Assessment text field-->
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                    <div class="inputText">Impact Assessment</div>
                                        <input type="text" name="impactAssessment" class="input">
                                    </div>
                                </div>
                                <br>
                                <input type="file" name="researchFileUpload">
                            
                                 <br> <br>

                            </div>
                        </div>
                         <!-- submission button -->
                    
                        <div class="click-btn">
                            
                            <input value="Submit" type="submit" class="btn" name="Submit"> 

                        </div>
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                //continue if used method is post
                                 
                                //validate the form and upload file to database
                                require_once '../php/uploadResearchValidation.php';
                                uploadResearchProject();
                            }
                        
                        
                        ?>
                    </form>
                       
                </div>
            </div>
        </div>
        </section>
    </div>
</body> 

<!---footer--->
<div class="footer">
        <div class="container">
            <br><br><br>
            <hr>
            <p class="creator">Team 1 Enterprise Pro 2023 - University of Bradford</p>
        </div>
      </div>

</html>