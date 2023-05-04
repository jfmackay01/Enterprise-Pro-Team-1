<!--Drop Down Menu for All faculties if user is admin -->

<select id="faculty" name="faculty">
    <option value=0>Select your faculty...</option>


    <?php
    require_once("../db/dbconnect.php");

        //set up SQL Query to select the department ID and department name
        $query = "SELECT departmentID, departmentName FROM departments";
 
    //perform query
    $result = mysqli_query($conn, $query);



    //Add options to drop down menu for each faculty
    if ($result->num_rows > 0) {
        

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['projectID'])){
                $dep = $project['departmentID'];
            }
            else{
                $dep = 0;
            }
        }
        else{
            $dep =0;
        }
        while ($row = $result->fetch_assoc()) { //show content
            $id = $row['departmentID'];
            $name = $row['departmentName'];
            echo ("<option value=" . $id);
            if($id == $dep){
                echo " selected";
            }
            echo( ">". $name ."</option>");
        }
    }


    ?>
</select>


