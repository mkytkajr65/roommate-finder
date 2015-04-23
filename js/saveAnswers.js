$("#answersSubmitButton").click(function(){
	var thisObj = $(this);

	$('form[name="formSubmit"]').each(function(){
		var thisForm = $(this);
		var data = {
			data: thisForm.serializeArray()
		};
		$.ajax({
        url: 'ajax/submitAnswers.php',
        type: 'POST',
        data: data,
        success: function(d){
                   console.log(d);
            }

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