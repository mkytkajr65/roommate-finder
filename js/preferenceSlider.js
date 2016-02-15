function getRatingString(num)
{
	var rv = "";
	switch(num)
	{
	    case "1":
	        rv = "Don't Care";
	        break;
	    case "2":
	        rv = "Care A Little";
	        break;
	    case "3":
	        rv = "Care Somewhat";
	        break;
	    case "4":
	        rv = "Pretty Important";
	        break;
	    case "5":
	        rv = "Very Important";
	        break;  
	    default:
	        rv = "error";
	}
	return rv;
}

$(document).ready(function(){
	jQuery('.preferenceSlider').each(function() {
    	$(this).prev().find(".sliderValue").text(getRatingString($(this).val()));
	});
});
$(".preferenceSlider").change(function(){
	$(this).prev().find(".sliderValue").text(getRatingString($(this).val()));
});