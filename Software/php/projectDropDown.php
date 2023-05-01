<!--Drop Down Menu for All Projects if user is admin -->

<label for="project">Select a project:</label> <br>
<select id="project" name="project">
    <option value=0>Select A Research Project</option>


    <?php
    require_once("../db/dbconnect.php");
    if (isset($_SESSION["logon"])) {

        //set up SQL Query to select the project ID and Title
        $query = "SELECT projectID, projectTitle FROM research_project";
    } else {
        header("../pages/home.php");
    }
    //perform query
    $result = mysqli_query($conn, $query);


    //Add options to drop down menu for each project
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $id = $row['projectID'];
            $title = $row['projectTitle'];
            echo ("<option value=" . $id . ">". $title ."</option>");
        }
    }


    ?>
</select>