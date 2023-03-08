<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Form</title>
    <?php
        require 'header.php';
        ?>
    <!-- css link -->
    <link rel="stylesheet" href="../css/standard.css">

</head>

<body>
    
    
        <h1 align="center">Welcome to the Impact Evidence Platform. Please Log in to continue</h1>
        <br />
        <!-- Login form -->
        
        <!---->
        <div  class = "content" align = "center">
        <form class = "input" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <fieldset style="width:350px" align="center">
                    <legend align="left"><b>Log in</b></legend>
                    <div>
                        <label for="input_email">email:</label>
                        <input type="text" name="email" size="24" /><br />
                    </div>
                    <br />
                    <div>
                        <label for="password">Password:</label>
                        <input type="password" name="password" value="" size="24" /><br />
                    </div>
                </fieldset>
                <fieldset style="width:350px" align="center"><input value="Submit" type="submit" class="button"/> &nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input value="Reset" type="reset" class="button"/>
                </fieldset>
            </form>

            <!--Run conductLogin.php file when form is submitted otherwise prompt user to enter details-->
            
               <!--- <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        require '../php/conductLogin.php';
                    } else {
                        echo "Input details to log on";
                    }
                    ?>; 
                
               
    <!--        
        </div>
    -->


    <!-- Login form -->
<section class="container2">

<form action="" method="post">
   <h3>log in</h3>
   <input type="email" name="email" class="box" placeholder="Your email" required>
   <input type="password" name="pass" class="box" placeholder="Your password" required>
   <input type="submit" class="btn" name="submit" value="log in">
   
</form>

    

</section>
</body>

</html>