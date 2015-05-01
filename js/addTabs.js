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
		


		//save new tab to database
		var data = {
			tab_name: inputFieldText
		};
		$.ajax({
				type: 'POST',
				url: 'ajax/saveTabs.php',
				data: data, 
				success: function(data) {
					var tab_id = data;
					var htmlToAppend = "<li><div data-tab='"+ tab_id +"' class='tabEntry'>"+ inputFieldText +"<span class='tabEntry_x'>x</div></li>";
					thisList.append(htmlToAppend);
				}
			});

		$(this).val("");
	}
});

$(document).on('click', '.tabEntry_x', function(){

	//delete tab from database
	var tab = $(this).parent().text().slice(0,-1);

	var tab_id = $(this).parent().data("tab");


	$('[data-tab_id="'+ tab_id +'"]').remove();


	$(this).parentsUntil(".questionTabPanel").find(tab);

	var data = {
			tab_name: tab
		};
		$.ajax({
				type: 'POST',
				url: 'ajax/deleteTabs.php',
				data: data
			});

	$(this).parent().remove();
});