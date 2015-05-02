$("#answersSubmitButton").click(function(){
	var thisObj = $(this);

	var firstForm = $('form[name="public_question_form"]');

	var data = {
			data: firstForm.serializeArray()
		};
	$.ajax({
        url: 'ajax/submitPublicAnswer.php',
        type: 'POST',
        data: data
    });


	$('form[name="formSubmit"]').each(function(){
		var thisForm = $(this);
		//console.log(thisForm.serializeArray());
		var data = {
			data: thisForm.serializeArray()
		};
		$.ajax({
        url: 'ajax/submitAnswers.php',
        type: 'POST',
        data: data
    	});
	});
	thisObj.html("Saving");
	thisObj.css("background-color", "#822433");
	setTimeout(function(){ 
	thisObj.html('Saved <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>');
	thisObj.css("background-color", "#454545");
	}, 1000);
	setTimeout(function(){ 
		thisObj.html("Save");
		thisObj.css("background-color", "#454545");
	}, 3000);
});