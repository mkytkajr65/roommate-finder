<?php
  require_once 'core/init.php';
  require_once 'functions/get_profile.php';
  $userForProfile = new User(Input::get('id'));
  $currentUser = new User();
  $currentUsersProfile = false;
  if($currentUser->getIsLoggedIn())
  {
    if($currentUser->data()->id==Input::get('id')||Input::get('id')=='')
    {
      //if the user is logged in and hes on his own profile page
      $userForProfile = $currentUser;
      $currentUsersProfile = true;
    }
  }
  else
  {
    Redirect::to('signin.php');
  }
  if(!$userForProfile->exists())
  {
    Redirect::to('index.php');
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
      <div class="pushContainer"></div>

       <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-10 center-block" id="profileArea">
                <div id="facebookDivContainer">
                <?php if(!$userForProfile->facebook && $currentUsersProfile){ ?>
                  <div id="facebookDiv" class="row">
                    <div class="col-md-10 center-block text-center">
                        <form class="form-inline" method="post" action="">
                          <div class="form-group">
                            <input type="text" class="form-control" name="facebook_link" id="facebook_link" placeholder="enter your facebook profile link!" data-toggle="tooltip" data-placement="top">
                          </div>
                          <button id="facebookSubmit" type="submit" class="btn btn-default">Add Facebook Link</button>
                          <span id="facebookTooltip" class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Add your facebook
                           link so that other students can easily view your profile for more accurate matches!" aria-hidden="true"></span>
                        </form>
                    </div>
                  </div> 
                <?php } ?>
                </div>
                <div class="row">
                  <div class="col-md-12">

                    <?php 
                    getAnswersForProfile($userForProfile->id); ?>          
                  </div>
                </div> 
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
    <script src="js/addFacebookLink.js"></script>
    <script src="js/deleteFacebookLink.js"></script>
    <script src="js/changeFacebookLink.js"></script>
    <script src="js/editFBLinkButton.js"></script>
  </body>
</html>
