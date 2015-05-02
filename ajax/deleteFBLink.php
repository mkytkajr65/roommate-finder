<?php
	require_once '../core/alt_init.php';
	
	$db = DB::getInstance();

	$user = new User();

	if($user->id)
	{
		$works = $db->update("user", $user->id, array(
				"facebook" => ""
			));
		if($works)
		{
			exit();
		}
	}
	echo "error";

?>