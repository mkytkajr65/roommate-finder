<?php 
	require_once '../core/alt_init.php';
	
	$db = DB::getInstance();

	$q_id = Input::get("question_id");
	$option_name = Input::get("option_name");

	$options = $db->query("SELECT * FROM options WHERE question_id = ?", array($q_id));
	$options = $options->results();

	$numberofOptions = count($options);

	if($option_name && $q_id)
	{
		$works = $db->insert("options",array(
				"name" => $option_name,
				"question_id" => $q_id,
				"value_index" => $numberofOptions+1
			));
		if($works)
		{
			echo "works";
		}
	}

?>