<?php
	require_once '../core/alt_init.php';

	$user = new User();

	echo escapeName($user->facebook);


?>