var edit = true;
$(document).on("click","#editFBLinkToggle",function(){
	$("#editFBArea").slideToggle();
	if(edit)
	{
		$(this).text("hide");
		edit = false;
	}
	else
	{
		$(this).text("edit");
		edit = true;
	}
});