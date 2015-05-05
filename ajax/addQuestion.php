<?php
	require_once '../core/alt_init.php';
	
	$db = DB::getInstance();

	$tab_id = Input::get("tab_id");

	if($tab_id)
	{
		$works = $db->insert("questions",array(
				"tab_id" => $tab_id,
				"type_id" => 1
			));
		if($works)
		{
			$lastId = $db->query("SELECT LAST_INSERT_ID() as id;");
			echo $lastId->first()->id;
		}
	}
?>