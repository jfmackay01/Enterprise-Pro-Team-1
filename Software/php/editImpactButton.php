<!--Form for edit impact button passing impactID value-->
<form method="post" action="../pages/editImpactProjects.php">
    
    <input type='hidden' name='impactID' value='<?php echo $impactID ?>'>

    <input class="click-btn" value="Edit Impact Project" type="submit" />
</form>