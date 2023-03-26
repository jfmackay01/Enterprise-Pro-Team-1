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
            <a class="back-btn" href="resimpproject.php" >Back</a>
            <h2>Upload Research Project</h2>
        </div>

        <section>
        <div class="container-fluid2">
            <div class="container">
                <div class="formBox">
                    <form>
                        <div class="row">
                            <h3>Associated Project</h3>
                            <br><br>
                            <div class="row">
                                <div class="col-sm-6">
                                <!--project title text field -->
                                    <div class="inputBox">
                                        <br>
                                        <div class="inputText">Project Title</div>
                                        <input type="text" name="projectTitle" class="input">
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
                                        <form>
                                            <!-- yes or no buttons for associated grants -->
                                            <input type="radio" name="grants_radio" id="grants_radio1" onclick="showGrants(1)"/> Yes <br>
                                            <input type="radio" name="grants_radio" id="grants_radio2" onclick="showGrants(2)"/> No <br>
                                            <br>
                                            <!-- displaying the form after clicking on YES button -->
                                            <div id="grants_radio1Div" style="display:none;"> 
                                                <div class="inputText">Date given: </div>
                                                <input type="date" name="grants_dateGiven" class="input">
                                                <input type="text" name="grants_amount" class="input" placeholder="Amount...">
                                                <input type="text" name="grants_givenBy" class="input"placeholder="Given by...">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            
                                 <!-- faculty selection -->
                                <div>

                                    <input type='hidden' name='userID' value='<?php echo $userID ?>'>
                                    <input type='hidden' name='conductUpdate' value='true'>
                                
                                    <?php
                                    //drop down menu for faculty selection
                                    require("../php/facultyDropDown.php");    
                               
                                    ?>
                                </div>
                                <br>
                                <br>
                                <!-- summary of research text field -->
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Summary of Research</div>
                                        <textarea class="input"></textarea> 
                                    </div>
                                </div>
                                
                                <!-- research output text area -->
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <br>
                                        <div class="inputText">Research Output</div>
                                        <br>
                                        <textarea class="input"></textarea> 
                                    </div>
                                </div>
                                 <!-- project summary text area -->
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <br>
                                        <div class="inputText">Project summary</div>
                                        <br>
                                        <textarea class="input"></textarea> 
                                    </div>
                                </div>
                                <!-- Potential UOA-->
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                    <div class="inputText">Potential UOA</div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                                <!-- notes text area -->
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <br>
                                        <div class="inputText">Notes</div>
                                        <br>
                                        <textarea class="input"></textarea> 
                                    </div>
                                </div>
                                <!-- Meetings text area -->
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <br>
                                        <div class="inputText">Meetings</div>
                                        <br>
                                        <textarea class="input"></textarea> 
                                    </div>
                                </div>
                                <!-- Follow up text area -->
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <br>
                                        <div class="inputText">Follow up</div>
                                        <br>
                                        <textarea class="input"></textarea> 
                                    </div>
                                </div>
                                <!-- underpinnedResearch text field -->
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <br>
                                        <div class="inputText">Underpinned Research</div>
                                        <br>
                                        <textarea class="input"></textarea> 
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
                            </div>
                        </div>
                    </form>
                    <!-- submission button -->
                    <div class="click-btn">
                            <h3>Submit</h3>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </div>
</body> 



</html>