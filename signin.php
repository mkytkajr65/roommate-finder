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
<div id="signinOverlay" class="noselect">
	<div id="passwordModal">
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
		  <div class="checkbox">
		  <label>
		    <input type="checkbox">Remember Me
		  </label>
		  </div>
		  <div><?php 
				//$user = new User();
				if(Input::exists())
				{
					echo Input::get("email");
					echo Input::get("password");
				}
?></div>
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
</div>