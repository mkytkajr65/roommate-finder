<?php
require_once 'core/init.php';
function getAnswersForProfile($profile_id)
{
	$db = DB::getInstance();
	$tabs = $db->query("SELECT * FROM tabs");
	$tabs = $tabs->results();


  $questions = $db->query("SELECT * FROM questions");
  $questions = $questions->results();

	$user = new User($profile_id);

	echo '<div class="row spacing2"><!--Large Widget Starts here-->
		<div class="col-md-8 largeRankingWidget center-block">
			<div class="topBannerForWidget">
				<div class="row">
				<div class="col-md-10 center-block">
				<div class="row paddingTop1">
					<div class="profilePic col-md-3 center-block"></div>
				</div>
				<div class="row spacing1">
					<div class="col-md-5 col-xs-6 center-block profileName">
						<p class="text-center lead"><a class="profileLink" href="profile.php?id='.$profile_id.'">'.escapeName($user->first_name).' '.escapeName($user->last_name).'</a></p>
					</div>
				</div>
				<div class="row">
					<div class = "text-center lead">
						<a href="http://www.facebook.com" target="_blank">
							<img border="0" alt="facebook" src="\images\social\FB-f-Logo__blue_29.png" width="29" height="29">
						</a>
					</div>
				</div>
			</div>
		</div>
			</div>';




			$counter = 0;
			echo '<div class="row spacing2">';
			$firstsection = true;
	foreach ($tabs as $tab) {
		if($firstsection != true)
			{
			if($counter >= 3){
				$counter = 0;
				echo '</div>
				<div class="row spacing2">';

			}

			echo '<div class="col-md-4">
				<div class="row">
					<div class="col-md-12">
						<h4 class="text-center">'.ucfirst(escapeName($tab->name)).'</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<ul class="noPadding">';

			$questions = $db->query("SELECT * FROM questions WHERE tab_id = ?", array($tab->id));
			$questions = $questions->results();




	    foreach($questions as $question)
	    {
				if($question->public)
				{
				      $answers = $db->query("SELECT * FROM answers WHERE question_id = ? AND user_id = ".$profile_id."", array($question->id));
				      $answers = $answers->results();


					if($question->type_id != 1 && $question->type_id != 2)
					{
						$checkboxes = false;
						$first_item = true;
						if($question->type_id == 4) {$checkboxes = true;}

			      foreach($answers as $answer){

			        $answer_strings =  $db->query("SELECT * FROM options WHERE question_id = ? AND value_index = ".escapeName($answer->value)."", array($question->id));
			        $answer_strings = $answer_strings->results();


			        foreach($answer_strings as $answer_string)
			        {
								if($checkboxes == false) echo '<li>'. escapeName($question->question).' <strong>'.escapeName($answer_string->name).'</strong></li>';
								if($checkboxes == true && $first_item == false){
									echo ', '.escapeName($answer_string->name).'';
								}
								if($checkboxes == true && $first_item == true){
									echo '<li>'. escapeName($question->question).' <strong> '.escapeName($answer_string->name).'';
									$first_item = false;
								}

			        }

			      }
						if($checkboxes == true) {echo '</strong></li>';}
					} else
					{
						foreach($answers as $answer){
							$yesno = $answer->value;
							if($yesno == 0)
							{
								echo '<li>'. escapeName($question->question).' <strong>No.</strong></li>';
							} else{
								echo '<li>'. escapeName($question->question).' <strong>Yes.</strong></li>';
							}

						}
					}
				}
	    }
			echo '</ul>
					</div>
						</div>
					</div>';
			$counter++;
		} else $firstsection = false;
  }
	echo '</div>';
	echo'</ul></div>
</div><!--Large widget ends here-->';

}




function getMatchesForProfile($profile_id)
{
	$db = DB::getInstance();
	$tabs = $db->query("SELECT * FROM tabs");
	$tabs = $tabs->results();

  $questions = $db->query("SELECT * FROM questions");
  $questions = $questions->results();
	$user = new User($profile_id);

	echo '<div class="row spacing2"><!--Large Widget Starts here-->
		<div class="col-md-8 largeRankingWidget center-block">
			<div class="topBannerForWidget">
				<div class="row">
				<div class="col-md-10 center-block">
				<div class="row paddingTop1">
					<div class="profilePic col-md-3 center-block"></div>
				</div>
				<div class="row spacing1">
					<div class="col-md-5 center-block profileName">
						<p class="text-center lead"><a class="profileLink" href="profile.php?id='.$profile_id.'">'.escapeName($user->first_name).' '.escapeName($user->last_name).'</a></p>
					</div>

				</div>
				<div class="row">
					<div class = "text-center lead">
						<a href="http://www.facebook.com" target="_blank">
							<img border="0" alt="facebook" src="\images\social\FB-f-Logo__blue_29.png" width="29" height="29">
						</a>
					</div>
				</div>
			</div>
		</div>
			</div>';




			$counter = 1;
			echo '<div class="row spacing2">';
			echo '<div class="col-md-4">
				<div class="row">
					<div class="col-md-12">
						<h4 class="text-center">Match Rating</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 paddingTop2">
						<div class="c100 p89 large center"><span>89%</span><div class="slice"><div class="bar"></div><div class="fill"></div></div></div>
					</div>
				</div>
			</div>';
			$firstsection = true;
	foreach ($tabs as $tab) {
		if($firstsection != true)
			{
			if($counter >= 3){
				$counter = 0;
				echo '</div>
				<div class="row spacing2">';

			}

			echo '<div class="col-md-4">
				<div class="row">
					<div class="col-md-12">
						<h4 class="text-center">'.ucfirst(escapeName($tab->name)).'</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<ul class="noPadding">';

			$questions = $db->query("SELECT * FROM questions WHERE tab_id = ?", array($tab->id));
			$questions = $questions->results();




	    foreach($questions as $question)
	    {
				if($question->public)
				{
		      $answers = $db->query("SELECT * FROM answers WHERE question_id = ? AND user_id = ".$profile_id."", array($question->id));
		      $answers = $answers->results();


					if($question->type_id != 1 && $question->type_id != 2)
					{
						$checkboxes = false;
						$first_item = true;
						if($question->type_id == 4) {$checkboxes = true;}

			      foreach($answers as $answer){

			        $answer_strings =  $db->query("SELECT * FROM options WHERE question_id = ? AND value_index = ".escapeName($answer->value)."", array($question->id));
			        $answer_strings = $answer_strings->results();


			        foreach($answer_strings as $answer_string)
			        {
								if($checkboxes == false) echo '<li>'. escapeName($question->question).' <strong>'.escapeName($answer_string->name).'</strong></li>';
								if($checkboxes == true && $first_item == false){
									echo ', '.escapeName($answer_string->name).'';
								}
								if($checkboxes == true && $first_item == true){
									echo '<li>'. escapeName($question->question).' <strong> '.escapeName($answer_string->name).'';
									$first_item = false;
								}

			        }

			      }
						if($checkboxes == true) {echo '</strong></li>';}
					} else
					{
						foreach($answers as $answer){
							$yesno = $answer->value;
							if($yesno == 0)
							{
								echo '<li>'. escapeName($question->question).' <strong>No.</strong></li>';
							} else{
								echo '<li>'. escapeName($question->question).' <strong>Yes.</strong></li>';
							}

						}
					}
				}
	    }
			echo '</ul>
					</div>
						</div>
					</div>';
			$counter++;
		} else $firstsection = false;
  }
	echo '</div>';
	echo'</ul></div>
</div><!--Large widget ends here-->';



}

function compareUsers($user1_id, $user2_id)
{
	$db = DB::getInstance();
	//get the users
	$user1 = new User($user1_id);
	$user2 = new User($user2_id);

	//get the questions
	$questions = $db->query("SELECT * FROM questions");
	$questions = $questions->results();
	$sum = 0;
	$n = 0;

	//for each question
	foreach($questions as $question)
	{
		if($question->type_id != 4)//checkboxes need to be handled differently
		{
			$n++;
			//get their answers
			$answers1 = $db->query("SELECT * FROM answers WHERE user_id = ? AND question_id = ?", array($user1_id, $question->id));
			$answers1 = $answers1->results;
			$answers2 = $db->query("SELECT * FROM answers WHERE user_id = ? AND question_id = ?", array($user2_id, $question->id));
			$answers2 = $answers2->results;
			if($answers1->preference_rating == NULL)$sum = $sum + (($answers1->value - $answers2->value)*($answers1->value - $answers2->value));
			else $sum = $sum + ($answers1->preference_rating + $answers2->preference_rating)*(($answers1->value -$answers2->value)*($answers1->value -$answers2->value));

		}

	}
	$match_value = $sum/$n;
	echo $match_value;
}

?>
