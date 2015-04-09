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
    <link href="css/bootstrap.min.css" rel="stylesheet"><!--Required for all pages-->
    <link href="css/mainLayout.css" rel="stylesheet"><!--Required for all pages-->
    <link href="css/navbar.css" rel="stylesheet"><!--Required for all pages-->
    <link href="css/circle.css" rel="stylesheet"><!--Required for all pages-->
    <link href="css/off-canvas-nav.css" rel="stylesheet"><!--Required for all pages-->
    <link href="css/admin.css" rel="stylesheet">

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
      if(true)
      {
        include("signin.php");
      }
    ?>
    <?php include("off-canvas-nav.php"); ?>
      <div class="pushContainer"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 center-block">
            <div class="row">
              <div class="col-md-12">
                <div class="questionTabPanel" role="tabpanel">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs noselect questionTypeNav" role="tablist">
                      <li role="presentation" class="active"><a href="#tabs" aria-controls="basics" role="tab" data-toggle="tab">Student Tabs</a></li>
                      <li role="presentation"><a href="#questions" aria-controls="profile" role="tab" data-toggle="tab">Student Questions</a></li>
                      <li role="presentation"><a href="#adjust_matching" aria-controls="profile" role="tab" data-toggle="tab">Adjust Matching Algorithm</a></li>
                    </ul>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tabs">
                            <div class="row adminPanel">
                              <div id="tabEntryContainer" class="col-md-12">
                                <ol id="tabEntryList">
                                  <li><div class="tabEntry">basics<span class="tabEntry_x">x</span></div></li>
                                  <li><div class="tabEntry">sleeping<span class="tabEntry_x">x</div></li>
                                  <li><div class="tabEntry">studying<span class="tabEntry_x">x</div></li>
                                  <li><div class="tabEntry">room<span class="tabEntry_x">x</div></li>
                                  <li><div class="tabEntry">personal<span class="tabEntry_x">x</div></li>
                                  <li><div class="tabEntry">lifestyle<span class="tabEntry_x">x</div></li>
                                </ol>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-8 center-block">
                                  <input type="text" id="tabEntryAdd" placeholder="Enter New Tabs">
                              </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="questions">
                          <div class="row adminPanel">
                            <div id="question_tab_area" class="col-md-12">
                              <div class="row tabSection"><!--Tab Section-->
                                <div class="col-md-11 center-block">
                                  <div class="row aTab">
                                    <div class="col-md-11 center-block">
                                      <div class="row">
                                        <div class="col-md-12 text-center"><h3 class="tabTitle">basics</h3></div>
                                      </div>
                                      <div class="row aQuestion">
                                        <div class="col-md-12 center-block">
                                          <div class="row">
                                            <div class="questionText col-md-8">
                                              <h3>Question</h3><p>Do you have a medical condition?</p>
                                            </div>
                                            <div class="col-md-4"><span class="glyphicon glyphicon-remove removeQuestion" aria-hidden="true"></span></div>
                                          </div>
                                          <div class="row">
                                            <div class="questionType col-md-12">
                                              <h3>Type: <small data-type="1">Yes/No with preference slider</small></h3>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="options col-md-12">
                                              <h3>Options:</h3>
                                              <ol class="optionEntryList">
                                                <li><div class="novalue">none</div></li>
                                              </ol>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-10 addOptions center-block"></div>
                                          </div>
                                          <div class="row editButtonRow">
                                            <div class="col-md-4 noselect text-center center-block editButton">edit</div>
                                          </div>
                                        </div>
                                  </div>
                                  <div class="row addNewQuestion">
                                    <div class="col-md-12"><span class="glyphicon glyphicon-plus addNewQ" aria-hidden="true"></span></div>
                                  </div>
                                    </div><!--Particular Tab-->
                                  </div>
                                  
                                  
                                </div>
                              </div>
                              <div class="row tabSection"><!--Tab Section-->
                                <div class="col-md-11 center-block">
                                  <div class="row aTab">
                                    <div class="col-md-11 center-block">
                                      <div class="row">
                                        <div class="col-md-12 text-center"><h3 class="tabTitle">sleeping</h3></div>
                                      </div>
                                      <div class="row aQuestion">
                                        <div class="col-md-12 center-block">
                                          <div class="row">
                                            <div class="questionText col-md-8">
                                              <h3>Question</h3><p>What kind of sleeper are you?</p>
                                            </div>
                                            <div class="col-md-4"><span class="glyphicon glyphicon-remove removeQuestion" aria-hidden="true"></span></div>
                                          </div>
                                          <div class="row">
                                            <div class="questionType col-md-12">
                                              <h3>Type: <small data-type="2">selection</small></h3>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="options col-md-12">
                                              <h3>Options:</h3>
                                              <ol class="optionEntryList">
                                                <li><div class="optionEntry">Light</div></li>
                                                <li><div class="optionEntry">Medium</div></li>
                                                <li><div class="optionEntry">Heavy</div></li>
                                              </ol>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-10 addOptions center-block"></div>
                                          </div>
                                          <div class="row editButtonRow">
                                            <div class="col-md-4 noselect text-center center-block editButton">edit</div>
                                          </div>
                                        </div>
                                  </div>
                                  <div class="row addNewQuestion">
                                    <div class="col-md-12"><span class="glyphicon glyphicon-plus addNewQ" aria-hidden="true"></span></div>
                                  </div>
                                    </div><!--Particular Tab-->
                                  </div>
                                  
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="adjust_matching">
                          <p>matching</p>
                        </div>
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
    <script src="js/off-canvas-slide.js"></script>
    <script src="js/preferenceSlider.js"></script>
    <script src="js/editButton.js"></script>
    <script src="js/addTabs.js"></script>
    <script src="js/createQuestion.js"></script>
  </body>
</html>
