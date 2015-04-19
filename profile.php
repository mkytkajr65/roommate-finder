<?php
  require_once 'core/init.php';
  require_once 'functions/get_profile.php';
  $user = new User(Input::get('id'));
  $currentUser = new User();
  if($currentUser->getIsLoggedIn())
  {
    if($currentUser->data()->id==Input::get('id')||Input::get('id')=='')
    {
      //if the user is logged in and hes on his own profile page
      $user = $currentUser;
    }
  }
  if(!$user->getIsLoggedIn())
  {
    Redirect::to('signin.php');
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
    <link href="css/off-canvas-nav.css" rel="stylesheet"><!--Required for all pages-->
    <link href="css/profile.css" rel="stylesheet">
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
    <?php include("off-canvas-nav.php"); ?>
      <div class="pushContainer"></div>

       <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-10 center-block" id="profileArea">
                <?php getAnswersForProfile($user->id); ?>            
              </div>
            </div>
          </div>
        </div>
      </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/off-canvas-slide.js"></script>
    <script src="js/preferenceSlider.js"></script>
    <script src="js/changeSizeProfilePic.js"></script>
  </body>
</html>
