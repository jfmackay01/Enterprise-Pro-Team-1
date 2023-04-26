<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="departmentFilter">Filter by department:</label>
    <select id="departmentFilter" name="departmentFilter">
        <option value="all">All</option>

        <?php
        require_once("../db/dbconnect.php");

        //Filter by 

        //set up SQL Query to select the department ID and Title
        $query = "SELECT departmentID, departmentName FROM departments";

        //perform query
        $result = mysqli_query($conn, $query);


        //Add options to drop down menu for each project
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $id = $row['departmentID'];
                $title = $row['departmentName'];
                echo ("<option value=" . $id . ">" . $title . "</option>");
            }
        }


        ?>
    </select>

    <!--Sort selector-->


    <label for="projectSort">Sort By: </label>
    <select id="projectSort" name="projectSort">
        <option value = "non">None</option>
        <option value = "projectTitle">Project Title</option>
        <option value = "departmentID">Department</option>
        <option value = "projectInvestigator">Investigator</option>
        <option value = "impactProgress">Progress</option>
        <option value = "potentialUOA"> UOA </option>


    </select>


    <input value="Sort/Filter" type="submit" />
</form>