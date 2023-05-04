<!--Drop Down Menu for All UOA if user is admin -->

<select id="UOA" name="UOA">
    <option value=0>Select potential UOA...</option>


    <?php
    require_once("../db/dbconnect.php");
    if (isset($_SESSION["logon"]) && $_SESSION["admin"] == true) {

        //set up SQL Query to select the uoa ID and uoa title
        $query = "SELECT uoaID, uoaTitle FROM uoa";
    } else {
        header("../pages/home.php");
    }
    //perform query
    $result = mysqli_query($conn, $query);


    //Add options to drop down menu for each uoa
    if ($result->num_rows > 0) {


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['projectID'])){
                $uoa = $project['potentialUOA'];
            }
            else{
                $uoa = 0;
            }
        }
        else{
            $uoa =0;
        }
        // display retrieved data in dropdown list
        while ($row = $result->fetch_assoc()) {
            $id = $row['uoaID'];
            $name = $row['uoaTitle'];
            echo ("<option value=" . $id);
            if($id == $uoa){
                echo " selected";
            }
            echo( ">". $name ."</option>");
        }
    }


    ?>
</select>
