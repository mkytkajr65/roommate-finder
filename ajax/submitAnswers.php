<?php
	require_once '../core/alt_init.php';
	require_once '../functions/parseQuestionType.php';
	$user = new User();
	$answers = Input::get("data");
	$db = DB::getInstance();

	foreach ($answers as $answer)//delete all Checkbox fields
	{
		$parsed = parseQuestion($answer["name"]);
		$questionType = $parsed[0];
		$qid = $parsed[1];
		if($questionType=="QC")
		{
			$row = $db->query("DELETE FROM answers WHERE user_id = ? AND question_id = ?", array($user->id, $qid));
		}
	}
	foreach ($answers as $answer)
	{
		$parsed = parseQuestion($answer["name"]);
		$questionType = $parsed[0];
		$qid = $parsed[1];
		echo $answer["name"] . " " . $answer["value"]." ";
		if($questionType=="Q")
		{
			$row = $db->query("SELECT * FROM answers WHERE user_id = ? AND question_id = ?", array($user->id, $qid));
			if(!$row->count())
			{
				$insertion = $db->insert("answers", array(
					"user_id" => $user->id,
					"question_id" => $qid,
					"value" => $answer["value"]
				));
			}
			else
			{
				$update = $db->query("UPDATE answers SET value = ?
				 WHERE user_id = ? AND question_id = ?", array($answer["value"], $user->id, $qid));
			}
			
		}
		elseif($questionType=="QPS")
		{
			$row = $db->query("SELECT * FROM answers WHERE user_id = ? AND question_id = ?", array($user->id, $qid));
			if($row->count())
			{
				$update = $db->query("UPDATE answers SET preference_rating = ?
				 WHERE user_id = ? AND question_id = ?", array($answer["value"], $user->id, $qid));
			}
		}
		elseif ($questionType=="QC")
		{
			$row = $db->query("SELECT * FROM answers WHERE user_id = ? AND question_id = ? AND value = ?", array($user->id, $qid, $answer["value"]));
			echo var_dump($row);
			if (!$row->count())//then insert
			{
				$insertion = $db->insert("answers", array(
					"user_id" => $user->id,
					"question_id" => $qid,
					"value" => $answer["value"]
				));

			}
		}
	}
 
?>