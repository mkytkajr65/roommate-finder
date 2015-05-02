<?php 
require_once 'core/init.php';
function getTabsWithQuestions()
{
	$db = DB::getInstance();
	$tabs = $db->query("SELECT * FROM tabs");
	$tabs = $tabs->results();
	$first = true;
	$user = new User();

    $public_question = $db->query("SELECT * FROM public_question");
    $public_question = $public_question->first();

    //public_question


    echo '<div role="tabpanel" class="tab-pane fade in active"';
    echo 'id="start">';


    echo '<br><form method="post" name="public_question_form" action="">';
    echo '<h4>'.escapeName($public_question->question).'</h4>';
    echo '<div class="container-fluid"><div class="col-md-12 answerInput">';
    echo '<div class="col-md-6">
              <div class="onoffswitch">
                <input type="hidden" name="Q_'.$public_question->id.'" value="0">
                <input type="checkbox" name="Q_'.$public_question->id.'"
                 value="1" class="onoffswitch-checkbox"
                  id="Q_'.$public_question->id.'"';
    $selected = $db->query("SELECT * FROM public_answer
    WHERE user_id = ?", array($user->id));
    if($selected->count())
    {
        $selected = $selected->results();

        
        if($selected[0]->value == 1) echo 'checked';
    }
    else
    {
        echo 'checked';
    }
    echo             '>
                <label class="onoffswitch-label" for="Q_'.$public_question->id.'">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                </label>
              </div>
          </div></div></div></form>';
    echo '</div>';


    //public_question end


	foreach ($tabs as $tab) {
		$questions = $db->query("SELECT * FROM questions WHERE tab_id = ?", array($tab->id));
		$questions = $questions->results();

        $name = str_replace(' ', '_', $tab->name);
        

		echo '<div role="tabpanel" class="tab-pane fade"';
		echo 'id="'. escapeName($name) .'">';
		echo '<form method="POST" name="formSubmit" action="">
                            <div class="row studentQuestion">
                              <div class="col-md-12">
                              <ol>';
        $public = $db->query("SELECT * FROM public_answer WHERE user_id = ?", array($user->id));
        $public = $public->results();
        
        foreach ($questions as  $question)
        {
            echo '<li><h4>'.escapeName($question->question).'</h4>';
            echo '<div class="container-fluid"><div class="col-md-12 answerInput">';
            if($question->type_id == "1")//yes/no
            {
                echo '<div class="col-md-6">
                          <div class="onoffswitch">
                            <input type="hidden" name="Q_'.$question->id.'" value="0">
                            <input type="checkbox" name="Q_'.$question->id.'"
                             value="1" class="onoffswitch-checkbox"
                              id="Q_'.$question->id.'"';
                $selected = $db->query("SELECT * FROM answers
                WHERE user_id = ? AND question_id = ?", array($user->id, $question->id));
                if($selected->count())
                {
                    $selected = $selected->results();

                    
                    if($selected[0]->value == 1) echo 'checked';
                }
                echo             '>
                            <label class="onoffswitch-label" for="Q_'.$question->id.'">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                          </div>
                      </div>';
            }
            else if($question->type_id == "2")//yes/no with preference slider
            {
                echo '<div class="col-md-5">
                          <div class="onoffswitch">
                            <input type="hidden" name="Q_'.$question->id.'" value="0">
                            <input type="checkbox" name="Q_'.$question->id.'" value="1" class="onoffswitch-checkbox" id="Q_'.$question->id.'"';
                $selected = $db->query("SELECT * FROM answers
                WHERE user_id = ? AND question_id = ?", array($user->id, $question->id));
                if($selected->count())
                {
                    $selected = $selected->results();

                    
                    if($selected[0]->value == 1) echo 'checked';
                }
                echo '>
                            <label class="onoffswitch-label" for="Q_'.$question->id.'">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                          </div>
                      </div>
                      <div class="col-md-7">
                        <div class="row">
                          <div class="col-md-7 col-md-offset-1">
                            <label>Preference Rating</label>
                          </div>
                          <div class="sliderValue" class="col-md-4"></div>
                        </div>
                        <input class="preferenceSlider" name="QPS_'.$question->id.'" type="range" value="';
                $selected = $db->query("SELECT * FROM answers
                WHERE user_id = ? AND question_id = ?", array($user->id, $question->id));
                if($selected->count())
                {
                    $selected = $selected->results();

                    
                    if($selected[0]->preference_rating != 'NULL') 
                    {
                        echo $selected[0]->preference_rating;
                    }
                    else
                    {
                        echo '1';
                    }
                }
                else
                {
                    echo '1';
                }
                echo '"  min="1" max="5" />
                      </div>';//QPS for slider denotes Question Preference Slider
            }
            else if($question->type_id == "3")//selection
            {
                $options = $db->query("SELECT * FROM options WHERE question_id = ?", array($question->id));
                $options = $options->results();
                echo '<div class="form-group">
                        <select class="form-control" name="Q_'.$question->id.'">';
                $valNum = 0;
                foreach ($options as $option)
                {
                    echo '<option value="'.$valNum.'"';
                    $selected = $db->query("SELECT * FROM answers
                    WHERE user_id = ? AND question_id = ?", array($user->id, $question->id));
                    if($selected->count())
                    {
                        $selected = $selected->first();
                        if($selected->value == $option->value_index-1)echo 'selected';
                    }
                    echo '>'.escapeName($option->name).'</option>';
                    $valNum++;
                }
                echo '</select></div>';
            }
            else if($question->type_id == "4")//checkboxes
            {
                $options = $db->query("SELECT * FROM options WHERE question_id = ?", array($question->id));
                $options = $options->results();
                echo '<div class="form-group">';
                $valNum = 0;
                foreach ($options as  $option)//QC denotes question with checkbox
                {
                    echo '<input type="checkbox" name="QC_'.$question->id.'" value="'.$valNum.'"';
                    $row = $db->query("SELECT * FROM answers WHERE user_id = ?
                    AND question_id = ? AND value = ?", array($user->id, $question->id, $option->value_index-1));
                    if($row->count())echo "checked";
                    echo '> '.escapeName($option->name).'<br>';
                    $valNum++;
                }
                echo'</div>';
            }
            echo '</div></div></li>';
        }
        echo '</ol></div></div></form></div>';
    }                                  
}

function getTabs()
{
	$db = DB::getInstance();
	$tabs = $db->query("SELECT * FROM tabs");
	$tabs = $tabs->results();
	$first = true;

    $first = false;
    echo '<li role="presentation" class="active"><a href="#start" aria-controls="start" role="tab" data-toggle="tab">Start</a></li>';

	foreach ($tabs as $tab){
        $name = str_replace(' ', '_', $tab->name);
		
		echo '<li role="presentation"><a href="#'.escapeName($name).'" aria-controls="'.escapeName($name).'" role="tab" data-toggle="tab">'.escapeName(ucfirst($tab->name)).'</a></li>';
	
	}
	
                    
}
?>