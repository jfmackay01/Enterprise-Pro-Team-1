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
            <a class="back-btn" href="resimpproject.php" >Back</a>
            <h2>View all Research Projects</h2>
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
</body>

</html>