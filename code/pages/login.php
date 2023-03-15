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

</html>