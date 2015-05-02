<?php
	require_once '../core/alt_init.php';
	
	$db = DB::getInstance();

	$o_id = Input::get("option_id");

	if($o_id)
	{
		$works = $db->delete("options",array('id', '=', $o_id));
	}
 
?>