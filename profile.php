<?php
  require_once 'core/init.php';
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
                <div class="row spacing2"><!--Large Widget Starts here-->
                  <div class="col-md-8 largeRankingWidget center-block">
                    <div class="topBannerForWidget">
                      <div class="row">
                      <div class="col-md-10 center-block">
                      <div class="row paddingTop1">
                        <div class="profilePic col-md-3 center-block"></div>
                      </div>
                      <div class="row spacing1">
                        <div class="col-md-5 center-block profileName">
                          <p class="text-center lead"><a class="profileLink" href="profile.php?id=<?php echo $user->id; ?>"><?php echo escapeName($user->first_name) . " " . escapeName($user->last_name); ?></a></p>
                        </div>

                      </div>
                      <div class="row">
                        <div class = "text-center lead">
                          <a href="http://www.facebook.com" target="_blank">
                            <img border="0" alt="facebook" src="\images\social\FB-f-Logo__blue_29.png" width="29" height="29">
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                    </div>
                    <div class="row spacing2">
                      <div class="col-md-4">
                        <div class="row">
                          <div class="col-md-12">
                            <h4 class="text-center">Sleeping</h4>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <ul class="noPadding">
                              <li>Sleeper Type: <strong>light</strong></li>
                              <li>Sleeps with <strong>lights on</strong></li>
                              <li>Goes to sleep <strong>before 10pm</strong></li>
                              <li>Wakes up <strong>before 6am</strong></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="row">
                          <div class="col-md-12">
                            <h4 class="text-center">Studying</h4>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <ul class="noPadding">
                              <li>Prefers to <strong>not</strong> study in room</li>
                              <li>Studies <strong>late at night</strong></li>
                              <li><strong>Does not </strong> require absolute quiet</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="row">
                          <div class="col-md-12">
                            <h4 class="text-center">Room</h4>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <ul class="paddingHalf">
                              <li><strong>Light</strong> sleeper</li>
                              <li>Prefers room to be <strong>colder</strong></li>
                              <li><strong>Always neat and organized</strong></li>
                              <li><strong>Willing to have and split the cost for </strong>cable tv</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row spacing2">
                      <div class="col-md-4">
                        <div class="row">
                          <div class="col-md-12">
                            <h4 class="text-center">Personal</h4>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <ul class="paddingHalf">
                              <li><strong>Sometimes</strong> needs alone time</li>
                              <li><strong>Comfortable</strong> with sharing belongings</li>
                              <li><strong>neat and organized</strong></li>
                              <li><strong>Quiet and withdrawn</strong> when bothered</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="row">
                          <div class="col-md-12">
                            <h4 class="text-center">Lifestyle</h4>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <ul class="noPadding">
                              <li>Prefers roommate with <strong>active lifestyle</strong></li>
                              <li>Music tastes are: <strong>Rap/Hiphop</strong>, <strong>Rock</strong> and <strong>Christian</strong></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!--Large widget ends here-->
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
