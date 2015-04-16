$(document).on("click",".removeQuestion",function(){
	var currentNode = $(this).parentsUntil(".aQuestion").parent();

	//delete question from database
	
	currentNode.remove();
});