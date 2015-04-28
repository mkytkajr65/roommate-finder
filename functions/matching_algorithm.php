<?php
require_once 'core/init.php';
function getMatchScore($user_1, $user_2)
{
	$db = DB::getInstance();

	$user1 = new User($user_1);
	$user2 = new User($user_2);

	$questions = $db->query("SELECT * FROM questions");
	$questions = $questions->results();

	$matches = 0;
	$totalQuestions = count($questions);

	foreach ($questions as  $question)
	{
		if($question->type_id != 4)//checkboxes need to be handled differently
		{
			$answers1 = $db->query("SELECT * FROM answers WHERE user_id = ? AND question_id = ?", array($user_1, $question->id));
			$answers1 = $answers1->first();
			$answers2 = $db->query("SELECT * FROM answers WHERE user_id = ? AND question_id = ?", array($user_2, $question->id));
			$answers2 = $answers2->first();

			


			if($answers1->value === $answers2->value)
			{
				$matches++;
			}
			
		}
	}

	$percentage = ($matches / $totalQuestions) * 100;
	echo $percentage;
}

?>