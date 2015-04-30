<?php
	require_once '../core/alt_init.php';
	$q_id = Input::get("q_id");
	$db = DB::getInstance();


	if($q_id)
	{
		$works = $db->delete("questions",array('id', '=', $q_id));
	}

?>