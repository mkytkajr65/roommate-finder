<?php
require_once 'core/init.php';
require_once 'functions/matching_algorithm.php';
function getAnswersForProfile($profile_id)
{
	$db = DB::getInstance();
	$tabs = $db->query("SELECT * FROM tabs");
	$tabs = $tabs->results();
	$currentUsersProfile = false;
	$questions = $db->query("SELECT * FROM questions");
	$questions = $questions->results();
  	$userForProfile = new User($profile_id);
	$currentUser = new User();
	if($currentUser->getIsLoggedIn())
	{
		if($currentUser->data()->id==Input::get('id')||Input::get('id')=='')
		{
		  //if the user is logged in and hes on his own profile page
		  $userForProfile = $currentUser;
		  $currentUsersProfile = true;
		}
	}
	echo '<div class="row spacing2"><!--Large Widget Starts here-->
		<div class="col-md-8 largeRankingWidget center-block">
			<div class="topBannerForWidget">
				<div class="row">
				<div class="col-md-10 center-block">
				<div class="row paddingTop1">
					<img src="https://my.gcc.edu/icsfileservershare/icsphotos/'.escape($userForProfile->id).'.jpg" class="profilePic col-md-3 center-block"></img>
				</div>
				<div class="row spacing1">
					<div class="col-md-5 col-sm-4 col-xs-6 center-block profileName">
						<p class="text-center lead"><a class="profileLink" href="profile.php?id='.$profile_id.'">'.escapeName($userForProfile->first_name).' '.escapeName($userForProfile->last_name).'</a></p>
					</div>
				</div>';

			echo'<div id="facebookLinkArea" class="row">
					<div id="fb_edit_area_container" class="center-block col-md-4 text-center lead">';
			if($userForProfile->facebook && $currentUsersProfile)
			{
					echo'<div id="fbButton_edit" class="row">
							<div class="col-md-8 center-block">
								<div class="row">
									<div class="col-md-6">
										<a href="'.escapeName($userForProfile->facebook).'" target="_blank">
											<img border="0" alt="facebook" src="\images\social\FB-f-Logo__blue_29.png" width="29" height="29">
										</a>
									</div>
									<div class="col-md-6">
										<span id="editFBLinkToggle" class="noselect">edit</span>
									</div>
								</div>
							</div>
						</div>
						<div id="editFBArea" class="row">
							<div class="col-md-8 center-block">
								<div class="row">
									<div class="col-md-6">
										<span style="vertical-align:middle;" id="removeFB" class="glyphicon glyphicon-remove noselect" aria-hidden="true"></span>
									</div>
									<div class="col-md-6">
										<span style="vertical-align:middle;" id="editFB" class="glyphicon glyphicon-edit noselect" aria-hidden="true"></span>
									</div>
								</div>
							</div>
						</div>';
			}
			echo 	'</div>
				</div>';
		if($userForProfile->facebook && $currentUsersProfile)
		{
			echo '<div id="changeFBArea" class="row">
					<div class="col-md-12 center-block text-center">
						<form class="form-inline" method="post" action="">
							<div class="form-group">
								<input type="text" class="form-control" name="facebook_change_link" id="facebook_change_link" placeholder="enter your new facebook profile link!" data-toggle="tooltip" data-placement="top">
							</div>
							<button id="facebookChangeSubmit" type="submit" class="btn btn-default">Change Facebook Link</button>
							<span id="facebookChangeTooltip" class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Change your facebook link!" aria-hidden="true"></span>
						</form>
	                </div>
				</div>';
		}

		echo'	</div>
		</div>
			</div>';
			$counter = 0;
			echo '<div class="row spacing2">';
			if(!$currentUsersProfile)
			{
				$matchScore = intval(getMatchScore($currentUser->id, $userForProfile->id));
				echo '<div class="col-md-4';
				$public_answer = $db->query("SELECT * FROM public_answer WHERE user_id = ?", array($userForProfile->id));
				if($public_answer->count())
				{
					$public_answer = $public_answer->first();
					$public_answer = $public_answer->value;
					if($public_answer != 1)
					{
						echo "center-block";
					}
				}
				echo'">
					<div class="row">
						<div class="col-md-12">
							<h4 class="text-center">Match Rating</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 paddingTop2">
							<div class="c100 p'.$matchScore.' large center"><span>'.$matchScore.'%</span><div class="slice"><div class="bar"></div><div class="fill"></div></div></div>
						</div>
					</div>
				</div>';
			}
			$firstsection = false;
			$targetUser = $userForProfile;

	foreach ($tabs as $tab) {
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
				      //echo print_r($answers);
					if($question->type_id != 1 && $question->type_id != 2)
					{
						$checkboxes = false;
						$first_item = true;
						if($question->type_id == 4) {$checkboxes = true;}
						//print_r($answers);
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

	$public_val = $db->query("SELECT * FROM answers WHERE question_id=2 AND user_id = ".$profile_id."");
	$public_val = $public_val->results();
	$public = $public_val[0]->value;


	echo '<br>';

	echo '<div class="row spacing2"><!--Large Widget Starts here-->
		<div class="col-md-8 largeRankingWidget center-block">
			<div class="topBannerForWidget">
				<div class="row">
				<div class="col-md-10 center-block">
				<div class="row paddingTop1">
					<img src="https://my.gcc.edu/icsfileservershare/icsphotos/'.escape($userForProfile->id).'.jpg" class="profilePic col-md-3 center-block"></img>
				</div>
				<div class="row spacing1">
					<div class="col-md-5 col-sm-4 center-block profileName">
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
			echo '<div class="col-md-4';



			$public_answer = $db->query("SELECT * FROM public_answer WHERE user_id = ?", array($user->id));


			if($public_answer->count())
			{
				$public_answer = $public_answer->first();
				$public_answer = $public_answer->value;

				if($public_answer != 1)
				{
					echo "center-block";
				}
			}

			echo'">';
			echo	'<div class="row">
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

	if($public == 1)
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

function cmp($a, $b)
{
    if ($a == $b) {
        return 0;
    }
    return ($a > $b) ? -1 : 1;
}


function getMatches($profile_id)
{

	$db = DB::getInstance();
	//get the users
	$profile = new User($profile_id);

	$users = $db->query("SELECT * FROM user");
	$users = $users->results();

	$userarray = array();
	foreach($users as $user)
	{
		$newUser = new UserScore($user->id, getMatchScore($profile_id, $user->id));
		if($user->id != $profile_id && $user->gender === $profile->gender && $user->status === $profile->status) array_push($userarray, $newUser);
	}

	usort($userarray, "cmp");

	return $userarray;
}

function listBestTenMatches($UserScoreArray)
{
	foreach ($UserScoreArray as $num => $userscore)
	{
		$db = DB::getInstance();
		$tabs = $db->query("SELECT * FROM tabs");
		$tabs = $tabs->results();

		$questions = $db->query("SELECT * FROM questions");
		$questions = $questions->results();

		$targetUser = new User($userscore->id);
		echo '<div class="row spacing2"><!--Large Widget Starts here-->
				<div class="col-md-8 largeRankingWidget center-block">
					<div class="topBannerForWidget">
						<div class="row">
						<div class="col-md-10 center-block">
						<div class="row paddingTop1">
							<img src="https://my.gcc.edu/icsfileservershare/icsphotos/'.escape($targetUser->id).'.jpg" class="profilePic col-md-3 center-block"></img>
						</div>
						<div class="row spacing1">
							<div class="col-md-5 col-sm-4 col-xs-6 center-block profileName">
								<p class="text-center lead"><a class="profileLink" href="profile.php?id='.$targetUser->id.'">'.escapeName($targetUser->first_name).' '.escapeName($targetUser->last_name).'</a></p>
							</div>

						</div>';
						if($targetUser->facebook){

		echo			'<div class="row">
							<div class = "text-center lead">
								<a href="'.escapeName($targetUser->facebook).'" target="_blank">
									<img border="0" alt="facebook" src="\images\social\FB-f-Logo__blue_29.png" width="29" height="29">
								</a>
							</div>
						</div>';
					}

		echo		'</div>
				</div>
					</div>';




					$counter = 1;
					echo '<div class="row spacing2">';
					echo '<div class="col-md-4';
					$public_answer = $db->query("SELECT * FROM public_answer WHERE user_id = ?", array($targetUser->id));

					if($public_answer->count())
					{
						$public_answer = $public_answer->first();
						$public_answer = $public_answer->value;

						if($public_answer != 1)
						{
							echo "center-block";
						}
					}

					echo'">
						<div class="row">
							<div class="col-md-12">
								<h4 class="text-center">Match Rating</h4>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 paddingTop2">
								<div class="c100 p'.intval($userscore->score).' large center"><span>'.intval($userscore->score).'%</span><div class="slice"><div class="bar"></div><div class="fill"></div></div></div>
							</div>
						</div>
					</div>';
					$firstsection = true;

			$public_answer = $db->query("SELECT * FROM public_answer WHERE user_id = ?", array($targetUser->id));

			if($public_answer->count())
			{
				$public_answer = $public_answer->first();
				$public_answer = $public_answer->value;

				if($public_answer == 1)
				{


					foreach ($tabs as $tab)
					{
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
						      $answers = $db->query("SELECT * FROM answers WHERE question_id = ? AND user_id = ".$targetUser->id."", array($question->id));
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
				}
				else
				{
					echo "<div class='col-md-12 text-center'><h3>Answers Not Public</h3></div>";
				}
			}
			else
			{
				echo "<div class='col-md-12 text-center'><h3>Answers Not Public</h3></div>";
			}
			echo '</div>';
			echo'</ul></div>
		</div><!--Large widget ends here-->';

		if($num == 9)
		{
			break;
		}
	}
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
