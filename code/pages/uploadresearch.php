<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Upload Research page</title>
    <?php
    require 'header.php';
    ?>
    <!-- css link -->
    <link rel="stylesheet" href="../css/standard.css">

</head>

<body>

    <div class="container4">
        <!-- back button -->
        <a class="back-btn" href="impactproject.php" >Back</a>
        <h2>Upload Research Project</h2>
    </div>

    <div class=container-fluid2">
        <div class="container5">
            <div class="formBox">
                <form>
                    <div class="row">
                        <h3>Associated Projects</h3>
                        <br><br>
                        <div class="row">
                            <!------ROW 1---->
                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <br>
                                <div class="inputText">Example project name</div>
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
                        <!------ROW 2---->

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
                                    <div class="inputText">Research protential</div>
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
                        <!------ROW 3---->
                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <br>
                                    <div class="inputText">Research Link</div>
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



</body>

</html>
