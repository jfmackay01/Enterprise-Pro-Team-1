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

<div class="container4">
            <!-- back button -->
            <a class="back-btn" href="users.php" >Back</a>
            <h2>Assign User to Project </h2>
        </div>
<?php

//check we've come here through post method by a logged on user with admin
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['logon']) && $_SESSION['admin'] == true) {
    $userID = $_POST['userID'];
} else {
    header("../pages/home.php");
}

?>


<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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

    <input value="Assign User To Project" type="submit" />
</form>


<?php
//if request is from the form and filled out assign the user to the project
if ($_POST['conductUpdate'] == true){
    if ($_POST['project'] != 0 && isset($_POST['role'])) {

        require_once("../php/conductAssignation.php");
        conductAssignation(intval($userID), intval($_POST['project']), intval($_POST['role']), $conn);
    }
    else{
        echo "Please fill out all inputs to assign the user.";
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