
$(document).on("click","#removeFB",function(){
	$.ajax({
        url: 'ajax/deleteFBLink.php',
        type: 'POST',
        success: function(data){
        	if(data != "error")
        	{
        		$("#facebookLinkArea").slideUp();
                $("#fb_edit_area_container").empty();
                $("#changeFBArea").remove();
        		$("#facebookDivContainer").append('<div id="facebookDiv" class="row"><div class="col-md-10 center-block text-center"><form class="form-inline" method="post" action=""><div class="form-group"><input type="text" class="form-control" name="facebook_link" id="facebook_link" placeholder="enter your facebook profile link!" data-toggle="tooltip" data-placement="top"></div><button id="facebookSubmit" type="submit" class="btn btn-default">Add Facebook Link</button><span id="facebookTooltip" class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Add your facebooklink so that other students can easily view your profile for more accurate matches!" aria-hidden="true"></span></form></div></div>');
        		$("#facebookDiv").slideDown( "slow" );
                $('#facebookTooltip').tooltip()

        	}
        }
    	});
});