<!--Drop Down Menu for progress if user is admin -->

<select id="impactProgress" name="impactProgress">
    <option value=0>Select impact progress...</option>

    <?php
    require_once("../db/dbconnect.php");
    if (isset($_SESSION["logon"]) && $_SESSION["admin"] == true) {

        //set up SQL Query to select the progress id and progress state
        $query = "SELECT progressID, progressStage FROM progress";
    } else {
        header("../pages/home.php");
    }
    //perform query
    $result = mysqli_query($conn, $query);

    //Add options to drop down menu for each progress
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $id = $row['progressID'];
            $name = $row['progressStage'];
            echo ("<option value=" . $id . ">". $name ."</option>");
        }
    }

    ?>
</select>


