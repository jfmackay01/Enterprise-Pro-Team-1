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
    <a class="back-btn" href="home.php">Back</a>
    <h2>Research Projects</h2>

    <!-- filter by department -->

    <div>
        <?php
        include("../php/projectFilterSortSelection.php")
        ?>
    </div>
</div>

<!-- table with research projects-->
<section class="container7">
    <table width=100%>

        <thead>
            <tr>
                <th> Project name </td>
                <th> Summary</td>
                <th> Project Investigator </td>
                <th> Department </td>
                </th>
                </th>
        </thead>

        <?php
        //if logged in then show assigned projects
        if (isset($_SESSION["logon"])) {
            require '../pages/viewAssignedResearchProjects.php';
        } else {
            echo ("Logon to view projects");
        }

        ?>
    </table>
</section>
<div class="col-md-4">
    <div class="p-3 border bg-light">
        <div class="col">
            <h4> Upload Research Project </h4>
        </div>
        <img src="https://i.imgur.com/jQKhmPH.png">
        <div class="clickhere">
            <a href="uploadresearch.php">
                <h3>Click Here</h3>
            </a>
        </div>
    </div>
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