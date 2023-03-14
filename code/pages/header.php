
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
            <div class="col-md-4">
               <div class="text">
                  <h1>
                     <a href="home.php"> <img src="https://i.imgur.com/dJBWnfs.png" width="40" height="40"></a>
                     Impact Project Records
                  </h1>
               </div>
            </div>
            <div class="col-md-4">
               <div class="box">
                  <form id="form"> 
                     <input type="search" name="q" placeholder="Search impact projects..">
                     <button>⌕</button>
                  </form>
               </div>
            </div>
            <div class="col-md-4">
               <div class="profile">
                  <a href="#profile"> <img src="https://i.imgur.com/S8Zjwpq.png"></a>
                  <?php
                     if (!isset($_SESSION["logon"])) {//if not logged on show login and register button
                        echo ("
                           <a href='../pages/login.php' class='loggedin' style ='float: right' > Login
                        ");
                        } else {//otherwise show profile and logoff button
                           echo ("
                              <a href='../php/logoff.php' class='loggedout' style ='float: right' > Log off
                           ");
                           if ($_SESSION["admin"] == true) {//if admin show admin links
                              echo ("
                                 <a href='adminhome.php' class='btn' style='float:right' > Admin home
                              ");
                           }
                        }
                  ?> <img src="https://i.imgur.com/hFKDKMc.png" width="40" height="40"></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>