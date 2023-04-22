<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reviewers page</title>
    <?php
    require 'header.php';
    ?>
    <!-- css link -->
    <link rel="stylesheet" href="../css/standard.css">

</head>

<body>

    <div class="container4">
        <!-- back button -->
        <a class="back-btn" href="home.php" >Back</a>
        <h2>Reviewers</h2>
      
        <!-- filter by option -->
        <select class="filter-select">
			<option value="all">Filter By</option>
			<option value="alphabet">Alphabet</option>
			<option value="department">Department</option>
		</select>
    </div>


    <section class="container3">
       <!-- <fieldset>
            <legend>Select a Reviewer</legend>

            <form method="post" action="answering.php">
                <?php foreach ($options as $key => $value): ?>
                    <label>
                        <input type="radio" name="<?php echo $key; ?>" /><?php echo $value; ?><br />
                    </label>
                <?php endforeach; ?>
                <input class="btn" name= "submit" type="submit" value="Submit">
            </form>
        </fieldset>-->

        
        
        <?php
        if (isset($_SESSION["logon"])){
            require '../php/showReviewers.php'; 
        }
        else{
            echo ("Logon to view reviewers");
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
