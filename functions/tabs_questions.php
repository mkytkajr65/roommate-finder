<?php 
require_once 'core/init.php';
function getTabsWithQuestions()
{
	$db = DB::getInstance();
	$user = new User();
	$tabs = $db->query("SELECT * FROM tabs");
	$tabs = $tabs->results();
	$first = true;
	$qnum = 1;
	foreach ($tabs as $tab) {
		$questions = $db->query("SELECT * FROM questions WHERE tab_id = ?", array($tab->id));
		$questions = $questions->results();

		//print_r($questions);
		if($first)
		{
			$first = false;
			echo '<div role="tabpanel" class="tab-pane fade in active"';
		}
		else
		{
			echo '<div role="tabpanel" class="tab-pane fade"';
		}
		echo 'id="'. escapeName($tab->name) .'">';
		echo '<form method="POST" action="">
                            <div class="row studentQuestion">
                              <div class="col-md-12">
                              <ol>';
        foreach ($questions as  $question)
        {
        	echo '<li><h4>'.escapeName($question->question).'</h4>';
        	echo '<div class="container-fluid"><div class="col-md-12 answerInput">';
        	if($question->type_id == "1")//yes/no
        	{
        		echo '<div class="col-md-6">
                          <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="Q'.$qnum.'">
                            <label class="onoffswitch-label" for="Q'.$qnum.'">
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
	                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="Q'.$qnum.'">
	                        <label class="onoffswitch-label" for="Q'.$qnum.'">
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
	                    <input class="preferenceSlider" type="range" value="1"  min="1" max="5" />
	                  </div>';
        	}
        	else if($question->type_id == "3")//selection
        	{
        		$options = $db->query("SELECT * FROM options WHERE question_id = ?", array($question->id));
        		$options = $options->results();
        		echo '<div class="form-group">
                        <select class="form-control" id="sel'.$qnum.'">';
                $valNum = 0;
                foreach ($options as $option)
                {
                	echo '<option value="'.$valNum.'">'.escapeName($option->name).'</option>';
                }
                echo '</select></div>';
        	}
        	else if($question->type_id == "4")//checkboxes
        	{
        		$options = $db->query("SELECT * FROM options WHERE question_id = ?", array($question->id));
        		$options = $options->results();
        		echo '<div class="form-group">';
        		$valNum = 0;
        		foreach ($options as  $option)
        		{
        			echo '<input type="checkbox" value="'.$valNum.'"> '.escapeName($option->name).'<br>';
        		}
	            echo'</div>';
        	}
        	echo '</div></div></li>';
        	$qnum++;
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
	foreach ($tabs as $tab){
		if($first)
		{
			$first = false;
			echo '<li role="presentation" class="active"><a href="#'.escapeName($tab->name).'" aria-controls="'.escapeName($tab->name).'" role="tab" data-toggle="tab">'.escapeName(ucfirst($tab->name)).'</a></li>';
		}
		else
		{
			echo '<li role="presentation"><a href="#'.escapeName($tab->name).'" aria-controls="'.escapeName($tab->name).'" role="tab" data-toggle="tab">'.escapeName(ucfirst($tab->name)).'</a></li>';
		}
	
	}
	
                    
}
?>