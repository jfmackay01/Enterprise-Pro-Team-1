<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head> 

    <?php
    require 'header.php';
    ?>
    
    <title>Assign to Project</title>

</head>

<body>
    <div class="container3">
        <!-- back button -->
        <a class="back-btn" href="users.php">Back</a>
        <h2>Assign to Project</h2>
    </div>
    <?php

    //check we've come here through post method by a logged on user with admin
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['logon']) && $_SESSION['admin'] == true) {
        $userID = $_POST['userID'];
    } else {
        header("../pages/home.php");
    }

    ?>


    <form class="container4" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type='hidden' name='userID' value='<?php echo $userID ?>'>
        <input type='hidden' name='conductUpdate' value='true'>


        <?php
        //drop down menu for project selection
        require("../php/projectDropDown.php");
        ?>

        <!-- Select if assigning as reviewer or collaborator-->
        <br>

        <input type="radio" id="0" name="role" value="0">
        <label for="0">Collaborator</label><br>
        <input type="radio" id="1" name="role" value="1">
        <label for="1">Reviewer</label><br>

        <input class="click-btn" value="Assign User To Project" type="submit" />
    </form>


    <?php
    if ($_POST['conductUpdate'] == true) {
        if ($_POST['project'] != 0) {

            require_once("../php/conductAssignation.php");
            conductAssignation(intval($userID), intval($_POST['project']), intval($_POST['role']), $conn);
        }
    }

    $conn->close();
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
