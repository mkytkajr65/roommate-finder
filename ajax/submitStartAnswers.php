<?php
	require_once '../core/alt_init.php';
	require_once '../functions/parseQuestionType.php';
	$user = new User();
	$answers = Input::get("data");
	$db = DB::getInstance();


	foreach ($answers as $answer)
	{
		echo $answer["name"] . " " . $answer["value"];
		if($answer["name"] == "Q_1" )
		{
			$row = $db->query("SELECT * FROM public_answer WHERE user_id = ?", array($user->id));
			if(!$row->count())
			{

				$insertion = $db->insert("public_answer", array(
								"user_id" => $user->id,
								"value" => $answer["value"]
							));
			}
			else
			{
				$update = $db->query("UPDATE public_answer SET value = ? WHERE user_id = ?", array($answer["value"], $user->id));
			}
		}
		else
		{
			$update = $db->query("UPDATE user SET status = ? WHERE id = ?", array($answer["value"], $user->id));
			echo print_r($update);
		}
	}

	
?>