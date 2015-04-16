$("#answersSubmitButton").click(function(){
	var thisObj = $(this);
	/*var tid = setInterval(function(){
		thisObj.html("Saving");
		thisObj.css("background-color", "#822433");
	}, 500);*/
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
});