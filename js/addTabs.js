$(document).on('keyup','#tabEntryAdd', function(e){
	if(e.keyCode == 13)
	{
	  $(this).trigger("enterKeyTabs");
	}
});

$(document).on('enterKeyTabs','#tabEntryAdd',function(e){
	if($(this).is(":focus"))//if true, the input field is in focus and the enter key has been pressed
	{
		var thisList = $(this).parentsUntil("#tabs").parent().find("#tabEntryList");
		var inputFieldText = $.trim($(this).val());
		var htmlToAppend = "<li><div class='tabEntry'>"+ inputFieldText +"<span class='tabEntry_x'>x</div></li>";
		thisList.append(htmlToAppend);


		//save new tab to database


		$(this).val("");
	}
});

$(document).on('click', '.tabEntry_x', function(){

	//delete tab from database

	$(this).parent().remove();
});