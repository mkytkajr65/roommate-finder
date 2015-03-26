<?php
  require_once 'core/init.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Roommate Finder</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mainLayout.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/off-canvas-nav.css" rel="stylesheet">
    <link href="css/slider.css" rel="stylesheet">
    <link href="css/homePage.css" rel="stylesheet">

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
          <div class="col-md-8 center-block">
            <div class="row">
              <div class="col-md-12" id="questionForm">
                  <div id="questionTabPanel" role="tabpanel">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#basics" aria-controls="basics" role="tab" data-toggle="tab">Basics</a></li>
                      <li role="presentation"><a href="#sleeping" aria-controls="profile" role="tab" data-toggle="tab">Sleeping</a></li>
                      <li role="presentation"><a href="#studying" aria-controls="studying" role="tab" data-toggle="tab">Studying</a></li>
                      <li role="presentation"><a href="#room" aria-controls="room" role="tab" data-toggle="tab">Room</a></li>
                      <li role="presentation"><a href="#personal" aria-controls="personal" role="tab" data-toggle="tab">Personal</a></li>
                      <li role="presentation"><a href="#lifestyle" aria-controls="lifestyle" role="tab" data-toggle="tab">Lifestyle</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="basics">
                          <form method="POST" action="">
                            <div class="row studentQuestion">
                              <div class="col-md-12">
                                <ol>
                                  <li><h4>Do you have a medical condition which would necessitate a special housing assignment?</h4>
                                      <div class="container-fluid">
                                        <div class="col-md-12 answerInput">
                                          <div class="col-md-6">
                                              <div class="onoffswitch">
                                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="Q1">
                                                <label class="onoffswitch-label" for="Q1">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="row">
                                              <div class="col-md-7 col-md-offset-1">
                                                <label>Preference Rating</label>
                                              </div>
                                              <div class="sliderValue" class="col-md-2">55</div>
                                            </div>
                                            <input class="preferenceSlider" type="range" value="0"  min="0" max="10" />
                                          </div>
                                        </div>
                                      </div>
                                  </li>
                                  <li><h4>Are you willing to share the answers to these questions with other students?</h4>
                                      <div class="container-fluid">
                                        <div class="col-md-12 answerInput">
                                          <div class="col-md-6">
                                              <div class="onoffswitch">
                                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="Q2">
                                                <label class="onoffswitch-label" for="Q2">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                  </li>
                                  <li><h4>Do you smoke?</h4>
                                      <div class="container-fluid">
                                        <div class="col-md-12 answerInput">
                                          <div class="col-md-6">
                                              <div class="onoffswitch">
                                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="Q2">
                                                <label class="onoffswitch-label" for="Q2">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                  </li>
                                  <li><h4>Can you live with someone who smokes?</h4>
                                      <div class="container-fluid">
                                        <div class="col-md-12 answerInput">
                                          <div class="col-md-6">
                                              <div class="onoffswitch">
                                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="Q3">
                                                <label class="onoffswitch-label" for="Q3">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="row">
                                              <div class="col-md-7 col-md-offset-1">
                                                <label>Preference Rating</label>
                                              </div>
                                              <div class="sliderValue" class="col-md-2">55</div>
                                            </div>
                                            <input class="preferenceSlider" type="range" value="0"  min="0" max="10" />
                                          </div>
                                        </div>
                                      </div>
                                  </li>
                                </ol>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="sleeping">
                          <form method="post" action="">
                            <div class="row studentQuestion">
                              <div class="col-md-12">
                                <ol>
                                  <li><h4>What kind of sleeper are you?</h4>
                                      <div class="container-fluid">
                                        <div class="col-md-12 answerInput">
                                              <div class="form-group">
                                                <label for="sel1">Sleeper Type:</label>
                                                <select class="form-control" id="sel1">
                                                  <option>Light</option>
                                                  <option>Medium</option>
                                                  <option>Heavy</option>
                                                </select>
                                              </div>
                                        </div>
                                      </div>
                                  </li>
                                </ol>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="studying">studying</div>
                        <div role="tabpanel" class="tab-pane" id="room">room</div>
                        <div role="tabpanel" class="tab-pane" id="personal">personal</div>
                        <div role="tabpanel" class="tab-pane" id="lifestyle">lifestyle</div>
                    </div>

                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
              <div class="col-md-8 center-block" id="saveArea">
                <div class="row">
                  <div class="col-md-4 center-block">
                    <button id="answersSubmit" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>
            </div>
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-slider.js"></script>
    <script src="js/off-canvas-slide.js"></script>
  </body>
</html>