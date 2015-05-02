<?php
  require_once 'core/init.php';
  require_once 'functions/get_tabs.php';
  require_once 'functions/getQuestions_Admin.php';
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
      include("navbar.php");

    ?>
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
                    </ul>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tabs">
                            <div class="row adminPanel">
                              <div id="tabEntryContainer" class="col-md-12">
                                <ol id="tabEntryList">
                                  <?php getTabs(); ?>
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
                              <?php getQuestions(); ?>
                            </div>
                          </div>
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
    <script src="js/preferenceSlider.js"></script>
    <script src="js/editButton.js"></script>
    <script src="js/addTabs.js"></script>
    <script src="js/createQuestion.js"></script>
    <script src="js/admin_delete_question.js"></script>
    <script src="js/tabReload.js"></script>
  </body>
</html>
