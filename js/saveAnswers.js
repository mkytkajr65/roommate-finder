// set interval
function mycode() {
  
}

$("#answersSubmitButton").click(function(){
	var thisObj = $(this);
	var tid = setInterval(function(){
		thisObj.html("Saving");
		thisObj.css("background-color", "#822433");
	}, 500);
});