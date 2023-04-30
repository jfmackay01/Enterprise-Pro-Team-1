<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="userFilter">Filter by:</label>
<select id="userFilter" name="userFilter">
    <option value = "all">All</option>
    <option value = "reviewer"> Reviewers </option>
    <option value = "collab"> Collaborator </option>
    <option value= "admin"> Admin </option> 
    <option value= "none"> No Role </option> 
</select>
    


    <input value="Sort/Filter" type="submit" />
</form>