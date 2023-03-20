<?php
session_start();
?>

<!DOCTYPE HTML>
<html>

<head>

    <link rel="stylesheet" type="text/css" href="../css/standard.css">
<!-- Standard Page Header -->
    <?php
    require 'header.php';
    ?>
    <!-- ---------------- -->
    <script src='../js/javascriptFunctions.js'></script>

</head>

<body>  

<div class="container4">
        <!-- back button -->
        <a class="back-btn" href="impactproject.php" >Back</a>
        <h2>Upload Impact Project</h2>
    </div>

    <section>
    <div class="container-fluid2">
        <div class="container">
            <div class="formBox">
                <form>
                    <div class="row">
                        <h3>Associated Projects</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <br>
                                <div class="inputText">Project Name</div>
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <br>
                                    <div class="inputText">PI and UoB Collaborators</div>
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="inputBox">
                                    <div class="inputText">Summary of Research</div>
                                    <textarea class="input"></textarea> 
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="inputBox">
                                    <div class="inputText">Associated Grants</div>
                                    <textarea class="input"></textarea> 
                                </div>
                            </div>
                            <h3>External Collaborators/Partners/Beneficiaries</h3>
                        <br><br>

                            <div class="col-sm-4">
                                <div class="inputBox">
                                    <br>
                                    <div class="inputText">Stakeholder</div>
                                    <br>
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="inputBox">
                                    <br>
                                    <div class="inputText">Interactions and Relationship</div>
                                    <br>
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="inputBox">
                                    <br>
                                    <div class="inputText">Potential for Impact</div>
                                    <br>
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="inputBox">
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="inputBox">
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="inputBox">
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="inputBox">
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="inputBox">
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="inputBox">
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                            <br><br>
                            <h3>Outputs</h3>
                        <br>
                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <br>
                                    <div class="inputText">Output Link</div>
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <br>
                                    <div class="inputText">Summary</div>
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <div class="inputText"></div>
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <div class="inputText"></div>
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                    </div>
                </form>
                <div class="click-btn">
                        <h3>Submit</h3>
                  </div>
            </div>
        </div>
    </div>
</section>
</body> 



</html>