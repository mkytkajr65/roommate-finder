<?php
require_once 'core/init.php';
function getAnswersForProfile($profile_id)
{
	$db = DB::getInstance();
	$tabs = $db->query("SELECT * FROM tabs");
	$tabs = $tabs->results();

  $questions = $db->query("SELECT * FROM questions", array($tab->id));
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


?>
