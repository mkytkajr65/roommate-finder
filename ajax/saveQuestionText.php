<?php
	require_once '../core/alt_init.php';
	
	$db = DB::getInstance();

	$text = Input::get("text");
	$q_id = Input::get("question_id");



	if($text && $q_id)
	{
		$works = $db->update("questions", $q_id, array(
				"question" => $text
			));
	}

?>