$(document).on('click', '.editButton' ,function(){
	var qTextNode = $(this).parent().parent().find(".questionText > p");
	var qText = $.trim(qTextNode.text());
	qTextNode.empty();
	qTextNode.append("<textarea rows='3'>"+ qText +"</textarea>");
	var qType = $(this).parent().parent().find(".questionType small");
	var qTypeText = qType.text(); //this needs to come from the database later
	var qTypeDataType = qType.data("type");
	var optionValues = ["Yes/No","Yes/No with preference slider","selection","checkboxes"];
	var selectValues = "<select class='selectEditType'>";
	for(var x in optionValues)
	{
		selectValues += "<option value='"+ x +"'"
		if(x == qTypeDataType)
		{
			selectValues += "selected='selected'";
		}
		selectValues +=  ">" + optionValues[x] + "</option>";
	}
	selectValues += "</select>";
	qType.empty();
	qType.append(selectValues);//this needs to come from the database later*/
	var optionsList = $(this).parent().parent().find(".optionEntryList");
	var optionEntry = optionsList.find(".optionEntry");
	if(optionEntry.length > 0)
	{
		$(optionsList).find("li > .optionEntry").each(function(){
			var spanX = "<span class='x_out'>x</span>";
			$(this).append(spanX);
		});
	}
	//console.log(qTypeDataType);
	if(qTypeDataType == "2" || qTypeDataType == "3")//needs to check database for acceptable values
	{
		var optionsAdd = $(this).parent().parent().find(".addOptions");
		optionsAdd.empty();
		optionsAdd.append("<input class='addOptionsInput' type='text' value='' placeholder='add options...' >");
	}
	$(this).removeClass("editButton");
	$(this).addClass("saveButton");
	$(this).text("save");
	//console.log(optionsList.html());
});

$(document).on('change', '.selectEditType' ,function(){
	var value = $(this).find("option:selected").val();
	$(this).parent().data("type",value);
	var optionsAdd = $(this).parentsUntil(".aQuestion").parent().find(".addOptions");
	var thisList = $(this).parentsUntil(".aQuestion").find(".optionEntryList");
	if(value == "2" || value == "3")//needs to check database for acceptable values
	{
		optionsAdd.empty();
		optionsAdd.append("<input class='addOptionsInput' type='text' value='' placeholder='add options...' >");
	}
	else
	{
		alert("Are you sure you want to change the question type? The options will be deleted!");
		//delete options from database for question if there are any

		var none = "<li><div class='novalue'>none</div></li>";
		thisList.empty();
		thisList.append(none);
		optionsAdd.empty();
	}
});

$(document).on('click', '.saveButton' ,function(){

	//save everything and return to read only view

	//get text from text area
	var qTextNodeTextArea = $(this).parentsUntil(".aQuestion").parent().find(".questionText textarea");
	var qText = $.trim(qTextNodeTextArea.val());

	//remove textarea and replace with text
	var qTextNode =  $(this).parentsUntil(".aQuestion").parent().find(".questionText > p");
	qTextNode.empty();

	qTextNode.append(qText);

	//save text in database

	//get text from selected option
	var selectedOption = $(this).parentsUntil(".aQuestion").find(".selectEditType option:selected").text();
	var qTypeNode = $(this).parent().parent().find(".questionType small");
	qTypeNode.empty();
	qTypeNode.append(selectedOption);

	//save selected option in database

	//remove input box
	var optionsAdd = $(this).parent().parent().find(".addOptions");
	optionsAdd.empty();

	//remove x_out class
	var optionsList = $(this).parent().parent().find(".optionEntryList");
	var optionEntry = optionsList.find(".optionEntry");
	if(optionEntry.length > 0)
	{
		$(optionsList).find("li > .optionEntry > .x_out").each(function(){
			$(this).remove();
		});
	}

	//replace with edit button
	$(this).removeClass("saveButton");
	$(this).addClass("editButton");
	$(this).text("edit");
});

$(document).on('keyup','.addOptionsInput', function(e){
	if(e.keyCode == 13)
	{
	  $(this).trigger("enterKeyOptions");
	}
});

$(document).on('enterKeyOptions','.addOptionsInput',function(e){
	var inputFieldText = $.trim($(this).val());
	if($(this).is(":focus") && inputFieldText.length > 0)//if true, the input field is in focus and the enter key has been pressed
	{
		var thisList = $(this).parentsUntil(".aQuestion").find(".optionEntryList");
		var htmlToAppend = "<li><div class='optionEntry'>"
		 + inputFieldText + "<span class='x_out'>x</span></div></li>";
		if(thisList.find(".novalue").length > 0)
		{
			thisList.empty();
		}
		thisList.append(htmlToAppend);


		//save option to database


		$(this).val("");
	}
});

$(document).on('click', '.x_out', function(){

	//delete option from database

	$(this).parent().remove();
});
