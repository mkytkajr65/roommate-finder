<?php require_once "core/init.php";
$user = new User();
if(Input::exists())
{
	if($user->login(Input::get("email"), Input::get("password")))
	{
		Redirect::to("index.php");
	}
	else
	{
		echo "something went wrong";
	}
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
  <div class="pushContainer"></div>
  <div class="container">
  	<div class="row">
  		<div class="col-md-6 center-block">
				<h3>Sign In</h3>
				<form method="post" action="signin.php">
					<div class="form-group">
						<label for="email_address_sign_in">Email address</label>
						<input type="email" name="email" class="form-control" id="email_address_sign_in" placeholder="Enter email">
					</div>
				  <div class="form-group">
				    <label for="password_sign_in">Password</label>
				    <input type="password" name="password" class="form-control" id="password_sign_in" placeholder="Password">
				  </div>
				  <!--<div class="checkbox">
				  <label>
				    <input type="checkbox">Remember Me
				  </label>
				  </div>-->
				  <button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/off-canvas-slide.js"></script>
    <script src="js/preferenceSlider.js"></script>
    <script src="js/on_off_switch.js"></script>
  </body>
</html>
