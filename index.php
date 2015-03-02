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
          <div class="col-md-10 center-block">

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