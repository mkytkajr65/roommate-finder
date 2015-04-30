<?php
	require_once '../core/alt_init.php';
	
	$db = DB::getInstance();

	$q_type_id = Input::get("q_type_id");
	$q_id = Input::get("q_id");


	if($q_type_id && $q_id)
	{
		$works = $db->update("questions", $q_id, array(
				"type_id" => $q_type_id
			));
	}


?>