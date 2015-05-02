$(function () {
  $('#facebookTooltip').tooltip()
})

$(document).on("click","#facebookSubmit",function(event){
	event.preventDefault();

	var link = $.trim($("#facebook_link").val());

	var data = {
		fb_link: link
	};
	$.ajax({
        url: 'ajax/fbLink.php',
        type: 'POST',
        data: data, 
        success: function(data){
        	if(data == "error")
        	{
        		$('#facebook_link').attr("title","Invalid Facebook Url");
        		$('#facebook_link').tooltip();
        		$('#facebook_link').tooltip("show")
        		setTimeout(function(){
			        $('#facebook_link').tooltip('destroy');
			        $('#facebook_link').attr("title","");
			    }, 3000);
        	}
        	else
        	{
                $.ajax({
                    url: 'ajax/getFBLink.php',
                    type: 'POST',
                    data: data,
                    success: function(data){
                        if(data)
                        {
                            $("#facebookDiv").slideUp( "slow" );
                            $("#facebookDivContainer").empty();
                            $("#fb_edit_area_container").append('<div id="fbButton_edit" class="row"><div class="col-md-8 center-block"><div class="row"><div class="col-md-6"><a href="'+data+'" target="_blank"><img border="0" alt="facebook" src="\\images\\social\\FB-f-Logo__blue_29.png" width="29" height="29"></a></div><div class="col-md-6"><span id="editFBLinkToggle" class="noselect">edit</span></div></div></div></div><div id="editFBArea" class="row"><div class="col-md-8 center-block"><div class="row"><div class="col-md-6"><span style="vertical-align:middle;" id="removeFB" class="glyphicon glyphicon-remove noselect" aria-hidden="true"></span></div><div class="col-md-6"><span style="vertical-align:middle;" id="editFB" class="glyphicon glyphicon-edit noselect" aria-hidden="true"></span></div></div></div></div>');
                            $("#facebookLinkArea").slideDown();
                            $("#facebookLinkArea").after('<div id="changeFBArea" class="row"><div class="col-md-12 center-block text-center"><form class="form-inline" method="post" action=""><div class="form-group"><input type="text" class="form-control" name="facebook_change_link" id="facebook_change_link" placeholder="enter your facebook profile link!" data-toggle="tooltip" data-placement="top"></div><button id="facebookChangeSubmit" type="submit" class="btn btn-default">Change Facebook Link</button><span id="facebookChangeTooltip" class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Change your facebook link!" aria-hidden="true"></span></form></div></div>');
                            $('#facebookChangeTooltip').tooltip();
                        }
                    }
                });
            }
        }
    	});
});