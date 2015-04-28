<?php
	require_once '../core/alt_init.php';
	$tab_name = Input::get("tab_name");
	$db = DB::getInstance();

	if($tab_name)
	{
		$works = $db->delete("tabs",array('name', '=', $tab_name));
	}

?>