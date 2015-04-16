<?php
	require_once '../core/alt_init.php';
	$answers = Input::get("data");
	$db = DB::getInstance();
	foreach ($answers as $answer)
	{
		echo $answer["name"]." ".$answer["value"]." ";
	}
 
?>