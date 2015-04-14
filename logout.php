<?php
	require_once "core/init.php";
	$user = new User();
	if($user->getIsLoggedIn())
	{
		$user->logout();
	}
	Redirect::to("signin.php");
?>