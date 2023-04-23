<link rel="stylesheet" type="text/css" href="../css/standard.css">
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src='../js/javascriptFunctions.js'></script>


<body>

   <div class="container-fluid">
      <div class="row">
         <div class="col-md-6">
            <div class="text">
               <h2>
                  <a href="home.php"> <img src="https://i.imgur.com/dJBWnfs.png" width="40" height="40"></a>
                  Impact Project Records
               </h2>
            </div>
         </div>
         <div class="col-md-6">
            <div class="profile">
                <img src="https://i.imgur.com/S8Zjwpq.png">
               <?php
               if (!isset($_SESSION["logon"])) { //if not logged on go to login page
                  if (!str_ends_with($_SERVER['REQUEST_URI'], "login.php") && !str_ends_with($_SERVER['REQUEST_URI'], "register.php")) { //otherwise show logoff button
                     header('location: ../pages/login.php');
                  }
               }
               ?> <a href="../pages/userProfile.php"><img src="https://i.imgur.com/hFKDKMc.png" width="40" height="40"></a>
            </div>
         </div>
      </div>
   </div>
   </div>
</body>