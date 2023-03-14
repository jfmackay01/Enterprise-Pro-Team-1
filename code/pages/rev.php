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
        <a class="back-btn" href="home.php" > <img src="../img/back.png" width="50" height="50"></a>
        <h2>Reviewers</h2>
      
        <!-- filter by option -->
        <select class="filter-select">
			<option value="all">Filter By</option>
			<option value="alphabet">Alphabet</option>
			<option value="department">Department</option>
		</select>
    </div>


    <section class="container3">
        <fieldset>
            <legend>Select a Reviewer</legend>

            <form method="post" action="answering.php">
                <?php foreach ($options as $key => $value): ?>
                    <label>
                        <input type="radio" name="<?php echo $key; ?>" /><?php echo $value; ?><br />
                    </label>
                <?php endforeach; ?>
                <input class="btn" name= "submit" type="submit" value="Submit">
            </form>
        </fieldset>
    </section>



</body>

</html>