<form method="post"  onsubmit="return confirmDeleteUser()" action="../pages/deleteUser.php">
    
    <input type='hidden' name='userID' value='<?php echo $userID ?>'>


    <input class="click-btn" value="Delete User" type="submit" />
</form>
