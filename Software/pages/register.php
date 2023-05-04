<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
<!----general header--->
<head>
    <title>Registration Form</title>
    <?php
        require 'header.php';
        ?>
</head>

<body>

        <!-- Registration form -->
    
    <section class="container2">
        <form method="post" onsubmit="return validateRegisterForm()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
            <h3>Register</h3>
                <input type="text" name="email" class="box" placeholder="Your email...">
                <input type="password" name="password" class="box" placeholder="Your password...">
                <input type="password" name="repassword" class="box" placeholder="Repeat your password...">
                <input value="Create account" class="btn" name="submit" type="submit">
                <div><br><a href="../pages/login.php">Already have an account? Sign in</a></br></div>

        </form>
  
        
        <!--Run registering.php file when form is submitted-->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require '../php/registering.php';
        } 
        ?>
    </section>

</body>

</html>