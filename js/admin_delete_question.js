$(document).on("click",".removeQuestion",function(){
	var currentNode = $(this).parentsUntil(".aQuestion").parent();

	var q_id = $(this).parentsUntil(".aQuestion").parent().children("#qid").data("question_id");

	//console.log(q_id);
	//delete question from database


	var data = {
			q_id: q_id
		};
		$.ajax({
				type: 'POST',
				url: 'ajax/deleteQuestion.php',
				data: data
			});
	

	
	currentNode.remove();
});