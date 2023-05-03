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

        //if editing project set default id
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['projectID'])){
                $prog = $project['impactProgress'];
            }
            else{
                $prog = 0;
            }
        }
        else{
            $prog =0;
        }

//print all progress stages and default if neccessary
        while ($row = $result->fetch_assoc()) {
            $id = $row['progressID'];
            $name = $row['progressStage'];
            echo ("<option value=" . $id);
            if($id == $prog){
                echo " selected";
            }
            echo( ">". $name ."</option>");
        }
    }

    ?>
</select>


