<?php
	require_once '../core/alt_init.php';
	
	$db = DB::getInstance();

	$tab_id = Input::get("tab_id");

	if($tab_id)
	{
		$works = $db->insert("questions",array(
				"tab_id" => $tab_id,
				"public" => 1,
				"type_id" => 1
			));
	}
?>