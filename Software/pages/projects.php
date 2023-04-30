<?php
    session_start();
?>
<html>

<head>

    <?php
        require 'header.php';
    ?>

</head>

</body>
<!-- page title -->
    <div class="container4">
            <!-- back button -->
            <a class="back-btn" href="home.php" >Back</a>
            <h2>Research Projects</h2>
    </div>

    <!-- table with research projects-->
    <table width=100%>
        <tr>
            <td> Project name </td>
            <td> Summary</td>
            <td> Project Investigator </td>
            <td> Department </td>
    <?php
    //if logged in then show assigned projects
            if (isset($_SESSION["logon"])){
                require '../pages/viewAssignedResearchProjects.php'; 
            }
            else{
                echo ("Logon to view projects");
            }

            ?>
    </table>    
        <?php
            if (isset($_SESSION["logon"])) {
               if ($_SESSION["admin"] == true) {//if admin show upload research project options
                  echo("
                     <div class='col-md-4'>
                        <div class='p-3 border bg-light'>
                            <div class='col'>
                                <h4> Upload Research Project </h4>
                            </div>
                            <img src='https://i.imgur.com/jQKhmPH.png'>
                            <div class='clickhere'>
                                <a href='uploadresearch.php'>
                                    <h3>Click Here</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class='col-md-4'>
                        <div class='p-3 border bg-light'>
                            <div class='col'>
                                <h4> Upload more files for selected Research Project </h4>
                            </div>
                            <img src='https://i.imgur.com/jQKhmPH.png'>
                            <div class='clickhere'>
                                <a href='uploadMoreResearchFiles.php'>
                                    <h3>Click Here</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class='col-md-4'>
                        <div class='p-3 border bg-light'>
                            <div class='col'>
                                <h4> Upload more grants </h4>
                            </div>
                            <img src='https://i.imgur.com/jQKhmPH.png'>
                            <div class='clickhere'>
                                <a href='uploadGrants.php'>
                                    <h3>Click Here</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                    ");
               }
            }
        ?>
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