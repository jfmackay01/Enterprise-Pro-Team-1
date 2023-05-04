<!--Form to pass projectID to the next page-->
<form method="post" action="../pages/editProject.php">
    
    <input type='hidden' name='projectID' value='<?php echo $projectID ?>'>

    <input  class="click-btn" value="Edit Project Details" type="submit" />
</form>
