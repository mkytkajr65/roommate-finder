$(document).on( "click",".addNewQuestion",function(){
	var newQuestion = "<div class='row aQuestion'><div data-question_id='1' class='col-md-12 center-block'><div class='row'><div class='questionText col-md-8'><h3>Question</h3><p><textarea rows='3'></textarea></p></div><div class='col-md-4'><span class='glyphicon glyphicon-remove removeQuestion' aria-hidden='true'></span></div></div><div class='row'><div class='questionType col-md-12'><h3>Type: <small data-type='1'><select class='selectEditType'><option value='1' selected='selected'>Yes/No</option><option value='2'>Yes/No with preference slider</option><option value='3'>selection</option><option value='4'>checkboxes</option></select></small></h3></div></div><div class='row'><div class='options col-md-12'><h3>Options:</h3><ol class='optionEntryList'><li><div class='novalue'>none</div></li></ol></div></div><div class='row'><div class='col-md-10 addOptions center-block'></div></div><div class='row editButtonRow'><div class='col-md-4 noselect text-center center-block saveButton'>save</div></div></div></div>";
 	
	var t_id = $(this).parentsUntil(".aTab").parent().data("tab_id");


 	var data = {
			tab_id: t_id
		};
		$.ajax({
				type: 'POST',
				url: 'ajax/addQuestion.php',
				data: data
			});


 	$(this).prev().after(newQuestion);
});