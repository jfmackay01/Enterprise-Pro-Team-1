<!--Drop Down Menu for All faculties if user is admin -->

<select id="faculty" name="faculty">
    <option value=0>Select your faculty...</option>


    <?php
    require_once("../db/dbconnect.php");
    if (isset($_SESSION["logon"]) && $_SESSION["admin"] == true) {

        //set up SQL Query to select the department ID and department name
        $query = "SELECT departmentID, departmentName FROM departments";
    } else {
        header("../pages/home.php");
    }
    //perform query
    $result = mysqli_query($conn, $query);


    //Add options to drop down menu for each faculty
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $id = $row['departmentID'];
            $name = $row['departmentName'];
            echo ("<option value=" . $id . ">". $name ."</option>");
        }
    }


    ?>
</select>


