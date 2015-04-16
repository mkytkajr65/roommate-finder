<?php
require_once 'core/init.php';
function getAnswersForProfile($profile_id)
{
	$db = DB::getInstance();
	$tabs = $db->query("SELECT * FROM tabs");
	$tabs = $tabs->results();

  $questions = $db->query("SELECT * FROM questions", array($tab->id));
  $questions = $questions->results();




	foreach ($tabs as $tab) {

    echo 'id="'. escapeName($tab->name) .'">';


		/*echo '<form method="POST" name="formSubmit" action="">
                            <div class="row studentQuestion">
                              <div class="col-md-12">
                              <ol>';*/
		$questions = $db->query("SELECT * FROM questions WHERE tab_id = ?", array($tab->id));
		$questions = $questions->results();



    foreach($questions as $question)
    {
      $answers = $db->query("SELECT * FROM answers WHERE question_id = ? AND user_id = ".$profile_id."", array($question->id));
      $answers = $answers->results();
      foreach($answers as $answer){
        $answer_strings =  $db->query("SELECT * FROM options WHERE question_id = ? AND value_index = ".escapeName($answer->value)."", array($question->id));
        $answer_strings = $answer_strings->results();
        foreach($answer_strings as $answer_string)
        {
          echo 'question="'. escapeName($question->question) .' answer="'. escapeName($answer_string->name) .'">';
        }

      }

    }
  }



}


?>
