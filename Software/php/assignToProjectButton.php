<!--Form -->
<form method="post" action="../pages/assignToProject.php">
    
    <input type='hidden' name='userID' value='<?php echo $userID ?>'>
    <!-- hidden placeholder values -->
    <input type='hidden' name = 'conductUpdate' value= false>
    <input type='hidden' name = 'project' value= 0>

    <input value="Assign to project" type="submit" />
</form>
