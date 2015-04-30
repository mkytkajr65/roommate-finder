<?php
	require_once 'core/init.php';
	function getQuestions()
	{
		$db = DB::getInstance();

		$tabs = $db->query("SELECT * FROM tabs");
		$tabs = $tabs->results();

		foreach ($tabs as $tab)
		{
			$questions = $db->query("SELECT * FROM questions WHERE tab_id = ?", array($tab->id));
			$questions = $questions->results();
			
			echo '<div class="row tabSection"><!--Tab Section-->
		                <div class="col-md-11 center-block">
		                  <div data-tab_id="'.$tab->id.'" class="row aTab">
		                    <div class="col-md-11 center-block">
		                      <div class="row">
		                        <div class="col-md-12 text-center"><h3 class="tabTitle">'.$tab->name.'</h3></div>
		                      </div>';
          	foreach ($questions as $question)
			{
				$questionType = $db->query("SELECT * FROM questions q INNER JOIN question_types qt ON q.type_id = qt.id AND q.id = ?",array($question->id));
				$questionType = $questionType->first();
				$questionType = $questionType->name;
		   		 echo          '<div class="row aQuestion">
		                        <div data-question_id="'.$question->id.'" id="qid" class="col-md-12 center-block">
		                          <div class="row">
		                            <div class="questionText col-md-8">
		                              <h3>Question</h3><p>'.$question->question.'</p>
		                            </div>
		                            <div class="col-md-4"><span class="glyphicon glyphicon-remove removeQuestion" aria-hidden="true"></span></div>
		                          </div>
		                          <div class="row">
		                            <div class="questionType col-md-12">
		                              <h3>Type: <small data-type="'.$question->type_id.'">'.escapeName($questionType).'</small></h3>
		                            </div>
		                          </div>
		                          <div class="row">
		                            <div class="options col-md-12">
		                              <h3>Options:</h3>
		                              <ol class="optionEntryList">
		                              	';
		                              	if ($question->type_id == 1 || $question->type_id == 2)
		                              	{
		                              		echo '<li><div class="novalue">none</div></li>';
		                              	}
		                              	else if($question->type_id == 3 || $question->type_id == 4)
		                              	{
		                              		$options = $db->query("SELECT * FROM options WHERE question_id = ?", array($question->id));
		                              		$options = $options->results();

		                              		foreach ($options as $option)
		                              		{
		                              			echo '<li><div data-option_id="'.$option->id.'" class="optionEntry">'.escapeName($option->name).'</div></li>';
		                              		}
		                              	}
		        echo '
		                              </ol>
		                            </div>
		                          </div>
		                          <div class="row">
		                            <div class="col-md-10 addOptions center-block"></div>
		                          </div>
		                          <div class="row editButtonRow">
		                            <div class="col-md-4 noselect text-center center-block editButton">edit</div>
		                          </div>
		                        </div>
		                  </div>';
		              }
		       	echo      '<div class="row addNewQuestion">
		                    <div class="col-md-12"><span class="glyphicon glyphicon-plus addNewQ" aria-hidden="true"></span></div>
		                  </div>
		                    </div><!--Particular Tab-->
		                  </div>
		                </div>
		              </div>';
			
		}

		//echo print_r($tabs);

		
	}

?>