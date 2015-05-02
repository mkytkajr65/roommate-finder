$(function () {
  $('#facebookChangeTooltip').tooltip()
})

var edit = true;
$(document).on("click","#editFB",function(){
	$("#changeFBArea").slideToggle();
});



$(document).on("click","#facebookChangeSubmit",function(event){

	event.preventDefault();

	var new_link = $.trim($("#facebook_change_link").val());

	var data = {
		new_link: new_link
	};
	$.ajax({
        url: 'ajax/changeFBLink.php',
        type: 'POST',
        data: data, 
        success: function(data){
        	if(data == "error")
        	{
        		$('#facebook_change_link').attr("title","Invalid Facebook Url");
        		$('#facebook_change_link').tooltip();
        		$('#facebook_change_link').tooltip("show")
        		setTimeout(function(){
			        $('#facebook_change_link').tooltip('destroy');
			        $('#facebook_change_link').attr("title","");
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
                        	console.log("here");
                            $("#fbButton_edit a").attr("href", data);
                        }
                    }
                });
        		$("#changeFBArea").slideToggle( "slow" );
        	}
        }
    	});
});