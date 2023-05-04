<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<!----general header--->
<head>
    <title>Login Form</title>
    <?php
        require 'header.php';
        ?>
</head>

<body>
  <!---log in form--->
<section class="container2">
       
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
               
        <h3>Log in</h3>
                 
        <input type="text" name="email" class="box" placeholder="Your email...">
        <input type="password" name="password" class="box" placeholder="Your password...">        
        <input value="Submit" type="submit" class="btn" name="Submit"> 
        <div><br><a href="../pages/register.php">Create a new account</a></br></div>
                
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require '../php/conductLogin.php';
        } 
    ?>

</section>
               
</body>
<!---footer--->
<div class="footer">
        <div class="container">
            <br><br><br>
            <hr>
            <p class="creator">Team 1 Enterprise Pro 2023 - University of Bradford</p>
        </div>
      </div>

</html>