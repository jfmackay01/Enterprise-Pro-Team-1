<!--Form to change password -->
<section class="container2">
       
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
               
        <h3>Change Password</h3>
                 
        <input type="password" name="oldPassword" class="box" placeholder="Old password...">        
        <input type="password" name="newPassword" class="box" placeholder="New password...">      
        <input value="Submit" type="submit" class="btn" name="Submit"> 
                
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") { //if used method is post, conduct password change
            require '../php/conductChangePassword.php';
            conductChangePassword($_SESSION['userID'] ,$_POST['oldPassword'],$_POST['newPassword']);
        } 
    ?>

</section>