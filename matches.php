<?php
  require_once 'core/init.php';
  require_once 'functions/get_profile.php';
  require_once 'functions/matching_algorithm.php';
  $user= new User();
  if(!$user->getIsLoggedIn())
  {
    Redirect::to("signin.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Roommate Finder</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet"><!--Required for all pages-->
    <link href="css/mainLayout.css" rel="stylesheet"><!--Required for all pages-->
    <link href="css/navbar.css" rel="stylesheet"><!--Required for all pages-->
    <link href="css/circle.css" rel="stylesheet"><!--Required for all pages-->
    <link href="css/matches.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
      /*
          ini_set('display_errors',1);
          ini_set('display_startup_errors',1);
          error_reporting(-1);
      */
      include("navbar.php");

    ?>
    <div class="pushContainer"></div>
     <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-10 center-block" id="matchArea">
              <div class="row">
                <div class="form-group col-md-3" id="sortMatchArea">
                  <label>Sort By:</label>
                  <select class="form-control">
                      <option>Match Percentage</option>
                      <option>Sleeping Match</option>
                      <option>Studying Match</option>
                      <option>Room Match</option>
                      <option>Personal Match</option>
                      <option>Lifestyle Match</option>
                  </select>
                </div>
              </div>

                <?php 

                $matches = getMatches($user->id);

                listBestTenMatches($matches);

                ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/preferenceSlider.js"></script>
    <script src="js/changeSizeProfilePic.js"></script>
  </body>
</html>
