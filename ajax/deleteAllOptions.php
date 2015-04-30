<?php
	require_once '../core/alt_init.php';
	
	$db = DB::getInstance();

	$q_id = Input::get("q_id");

	if($q_id)
	{
		$works = $db->delete("options",array('question_id', '=', $q_id));
	}

?>