<?php
  require_once 'core/init.php';
  $user = new User();
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
    <link href="css/off-canvas-nav.css" rel="stylesheet"><!--Required for all pages-->
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
      /*if(true)
      {
        include("signin.php");
      }*/
    ?>
    <?php include("off-canvas-nav.php"); ?>
      <div class="pushContainer"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 center-block">
            <div class="row">
              <div class="col-md-12" id="questionForm">
                  <div class="questionTabPanel" role="tabpanel">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs noselect questionTypeNav" role="tablist">
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
                                          <div class="col-md-5">
                                              <div class="onoffswitch">
                                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="Q1">
                                                <label class="onoffswitch-label" for="Q1">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                              </div>
                                          </div>
                                          <div class="col-md-7">
                                            <div class="row">
                                              <div class="col-md-7 col-md-offset-1">
                                                <label>Preference Rating</label>
                                              </div>
                                              <div class="sliderValue" class="col-md-4"></div>
                                            </div>
                                            <input class="preferenceSlider" type="range" value="1"  min="1" max="5" />
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
                                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="Q3">
                                                <label class="onoffswitch-label" for="Q3">
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
                                          <div class="col-md-5">
                                              <div class="onoffswitch">
                                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="Q4">
                                                <label class="onoffswitch-label" for="Q4">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                              </div>
                                          </div>
                                          <div class="col-md-7">
                                            <div class="row">
                                              <div class="col-md-7 col-md-offset-1">
                                                <label>Preference Rating</label>
                                              </div>
                                              <div class="sliderValue" class="col-md-4"></div>
                                            </div>
                                            <input class="preferenceSlider" type="range" value="1"  min="1" max="5" />
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
                                                <select class="form-control" id="sel1">
                                                  <option value="0">Light</option>
                                                  <option value="1">Medium</option>
                                                  <option value="2">Heavy</option>
                                                </select>
                                              </div>
                                        </div>
                                      </div>
                                  </li>
                                  <li><h4>Do you prefer to Sleep with the lights on?</h4>
                                      <div class="container-fluid">
                                        <div class="col-md-12 answerInput">
                                          <div class="col-md-5">
                                              <div class="onoffswitch">
                                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="Q5">
                                                <label class="onoffswitch-label" for="Q5">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                              </div>
                                          </div>
                                          <div class="col-md-7">
                                            <div class="row">
                                              <div class="col-md-7 col-md-offset-1">
                                                <label>Preference Rating</label>
                                              </div>
                                              <div class="sliderValue" class="col-md-4">0</div>
                                            </div>
                                            <input class="preferenceSlider" type="range" value="1"  min="1" max="5" />
                                          </div>
                                        </div>
                                      </div>
                                  </li>	
								  <li><h4>I plan on going to sleep at: </h4>
                                      <div class="container-fluid">
                                        <div class="col-md-12 answerInput">
                                              <div class="form-group">
                                                <select class="form-control" id="sel2">
                                                  <option value="0">Before 10 PM</option>
                                                  <option value="1">10-11pm</option>
                                                  <option value="2">11-12am</option>
												  <option value="3">12-1am</option>
												  <option value="4">After 1 AM</option>
                                                </select>
                                              </div>
                                        </div>
                                      </div>
                                  </li>
								  <li><h4>I plan on waking up at: </h4>
                                      <div class="container-fluid">
                                        <div class="col-md-12 answerInput">
                                              <div class="form-group">
                                                <select class="form-control" id="sel3">
                                                  <option value="0">Before 6 AM</option>
                                                  <option value="1">6-7am</option>
                                                  <option value="2">7-8am</option>
                        												  <option value="3">8-9am</option>
                        												  <option value="4">9-10am</option>
                        												  <option value="5">After 10 AM</option>
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
                        <div role="tabpanel" class="tab-pane" id="studying">
                          <form method="post" action="">
                            <div class="row studentQuestion">
                              <div class="col-md-12">
                                <ol>
                                  <li><h4>Do you prefer to study in your room?</h4>
                                      <div class="container-fluid">
                                        <div class="col-md-12 answerInput">
                                          <div class="col-md-5">
                                              <div class="onoffswitch">
                                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="Q8">
                                                <label class="onoffswitch-label" for="Q8">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                              </div>
                                          </div>
                                          <div class="col-md-7">
                                            <div class="row">
                                              <div class="col-md-7 col-md-offset-1">
                                                <label>Preference Rating</label>
                                              </div>
                                              <div class="sliderValue" class="col-md-4"></div>
                                            </div>
                                            <input class="preferenceSlider" type="range" value="1"  min="1" max="5" />
                                          </div>
                                        </div>
                                      </div>									  
                                  </li>
								  <li><h4>I Prefer to study: </h4>
                                      <div class="container-fluid">
                                        <div class="col-md-12 answerInput">
                                              <div class="form-group">
                                                <select class="form-control" id="sel4">
                                                  <option value="0">During the Day</option>
                                                  <option value="1">In the Evening</option>
												                          <option value="2">Late at Night</option>
                                                </select>
                                              </div>
                                        </div>
                                      </div>
                                  </li>								  
                                  <li><h4>Do you need absolute quiet when you study?</h4>
                                      <div class="container-fluid">
                                        <div class="col-md-12 answerInput">
                                          <div class="col-md-5">
                                              <div class="onoffswitch">
                                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="Q10">
                                                <label class="onoffswitch-label" for="Q10">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                              </div>
                                          </div>
                                          <div class="col-md-7">
                                            <div class="row">
                                              <div class="col-md-7 col-md-offset-1">
                                                <label>Preference Rating</label>
                                              </div>
                                              <div class="sliderValue" class="col-md-4"></div>
                                            </div>
                                            <input class="preferenceSlider" type="range" value="1"  min="1" max="5" />
                                          </div>
                                        </div>
                                      </div>
                                  </li>								  
                                </ol>
                              </div>
                            </div>
                          </form>
                        </div>										
                        <div role="tabpanel" class="tab-pane" id="room">
                          <form method="post" action="">
                            <div class="row studentQuestion">
                              <div class="col-md-12">
                                <ol>                                  
								  <li><h4>I Prefer my room: </h4>
                                      <div class="container-fluid">
                                        <div class="col-md-12 answerInput">
                                              <div class="form-group">
                                                <select class="form-control" id="sel5">
                                                  <option value="0">Warmer</option>
                                                  <option value="1">Colder</option>
                                                </select>
                                              </div>
                                        </div>
                                      </div>
                                  </li>
								  <li><h4>I tend to keep my room and belongings: </h4>
                                      <div class="container-fluid">
                                        <div class="col-md-12 answerInput">
                                              <div class="form-group">
                                                <select class="form-control" id="sel6">
                                                  <option value="0">Always neat and organized</option>
                                                  <option value="1">Neat most of the time</option>
                        												  <option value="2">Cluttered most of the time</option>
                        												  <option value="3">Always messy and disorganized</option>
                                                </select>
                                              </div>
                                        </div>
                                      </div>
                                  </li>								  
								  <li><h4>Cable TV: </h4>
                                      <div class="container-fluid">
                                        <div class="col-md-12 answerInput">
                                              <div class="form-group">                                                
                                                <select class="form-control" id="sel7">
                                                  <option value="0">I want TV in my room</option>
                                                  <option value="1">I don't want TV in my room</option>
                        												  <option value="2">No Preference, and not interested in splitting the cost</option>
                        												  <option value="3">No Preference, but willing to split the cost</option>
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
                        <div role="tabpanel" class="tab-pane" id="personal">
                          <form method="post" action="">
                            <div class="row studentQuestion">
                              <div class="col-md-12">
                                <ol>
                                  <li><h4>How often do you need alone time?</h4>
                                      <div class="container-fluid">
                                        <div class="col-md-12 answerInput">
                                              <div class="form-group">
                                                <select class="form-control" id="sel12">
                                                  <option value="0">Often</option>
                                                  <option value="1">Sometimes</option>
                                                  <option value="2">Rarely</option>
                                                  <option value="3">Never</option>
                                                </select>
                                              </div>
                                        </div>
                                      </div>
                                  </li>
                                  <li><h4>How comfortable are you with sharing your belongings?</h4>
                                      <div class="container-fluid">
                                        <div class="col-md-12 answerInput">
                                              <div class="form-group">
                                                <label for="sel1">I am:</label>
                                                <select class="form-control" id="sel9">
                                                  <option value="0">not comfortable sharing my belongings</option>
                                                  <option value="1">willing to share most things if asked first.</option>
                                                  <option value="2">willing to share anything without restrictions.</option>
                                                </select>
                                              </div>
                                        </div>
                                      </div>
                                  </li>
                                  <li><h4>How do you react when something is bothering you?</h4>
                                      <div class="container-fluid">
                                        <div class="col-md-12 answerInput">
                                              <div class="form-group">
                                                <select class="form-control" id="sel10">
                                                  <option value="0">I like to talk about it.</option>
                                                  <option value="1">I tend to become quiet and withdrawn.</option>
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
                        <div role="tabpanel" class="tab-pane" id="lifestyle">
                          <form method="post" action="">
                            <div class="row studentQuestion">
                              <div class="col-md-12">
                                <ol>
                                  <li><h4>I prefer a roommate with:</h4>
                                      <div class="container-fluid">
                                        <div class="col-md-12 answerInput">
                                              <div class="form-group">
                                                <select class="form-control" id="sel1">
                                                  <option value="0">an active lifestyle</option>
                                                  <option value="1">a quiet lifestyle</option>
                                                </select>
                                              </div>
                                        </div>
                                      </div>
                                  </li>
                                  <li><h4>My music tastes: (check all that apply)</h4>
                                      <div class="container-fluid">
                                        <div class="col-md-12 answerInput">
                                              <div class="form-group">
                                                <label for="sel1">I like:</label>
                                                <div class="form-group">
                                                  <input type="checkbox"> Alternative
                                                  <input type="checkbox"> Christian
                                                  <input type="checkbox"> Classical
                                                  <input type="checkbox"> Country
                                                  <input type="checkbox"> Hard/Metal
                                                  <input type="checkbox"> Rap/Hip-Hop
                                                  <input type="checkbox"> Rock
                                                  <input type="checkbox"> Soft Rock/Pop
                                                </div>
                                              </div>
                                        </div>
                                      </div>
                                  </li>
                                  <div class="container-fluid" style="color:red">(next two current students only) </div>
                                  <li><h4>Do you currently have a roommate?</h4>
                                      <div class="container-fluid">
                                        <div class="col-md-12 answerInput">
                                          <div class="col-md-6">
                                              <div class="onoffswitch">
                                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="Q19">
                                                <label class="onoffswitch-label" for="Q19">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                  </li>
                                  <li><h4>Are you willing to consider moving from your current room?</h4>
                                      <div class="container-fluid">
                                        <div class="col-md-12 answerInput">
                                          <div class="col-md-6">
                                              <div class="onoffswitch">
                                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="Q20">
                                                <label class="onoffswitch-label" for="Q20">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                  </li>
                                  <li><h4>Please read and check the box below.</h4>
                                    <div class="container-fluid">
                                    <input type="checkbox"><strong> I have answered all the questions to the best of my ability. Please share my responses with Student Life & Learning.</strong>
                                    </div>
                                </li>
                                </ol>
                              </div>
                            </div>
                          </form>
                        </div>
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
                    <button id="answersSubmitButton">Save</button>
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
    <script src="js/saveAnswers.js"></script>
  </body>
</html>
