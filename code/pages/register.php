<?php
session_start();
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registration Form</title>
    <?php
        require 'header.php';
        ?>
    <!-- css link -->
    <link rel="stylesheet" href="../css/standard.css">

   <script src='../js/javascriptFunctions.js'></script>
    
</head>

<body>
    <!-- ---------------- -->
    <div class="content">
        <!-- Content -->
        <h1 align="center">Please enter new account details to sign up!</h1>
        <br />
    
        <!-- Registration form form -->
        <!--
        <div align="center">
            <form class="input" name="register" onsubmit="return validateRegisterForm()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <fieldset style="width:350px" align="right">
                    <legend align="left"><b>Registration Form</b></legend>
                    <div>
                        <label for="email">Email:</label>
                        <input type="text" name="email" size="24" /><br />
                    </div>
                    <br />
                    <div>
                        <label for="password">Password:</label>
                        <input type="password" name="password" value="" size="24" /><br />
                    </div>
                    <br />
                    <div>
                        <label for="password">Re-enter Password:</label>
                        <input type="password" name="repassword" value="" size="24" /><br />
                    </div>
                </fieldset>
                <fieldset style="width:350px" align="center">
                    <input value="Submit" type="submit" /> &nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input value="Reset" type="reset" />
                </fieldset>
            </form>
        </div>
        -->
        <!--Run registering.php file when form is submitted-->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require '../php/registering.php';
        } else {
            echo "Input details to register";
        }
        ?>;
    </div>



    <!-- Register form -->
<section class="container2">

<form action="" method="post">
   <h3>Register</h3>
   <input type="text" name="name" class="box" placeholder="Your Email" required>
   <input type="password" name="pass" class="box" placeholder="Your password" required>
   <input type="password" name="cpass" class="box" placeholder="confirm your password" required>
   <input type="submit" class="btn" name="submit" value="Create account">
</form>

</section>

</body>

</html>