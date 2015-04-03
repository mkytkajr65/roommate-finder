var toggleSpan = $("#toggle");
var off_canvas = $("#off-canvas-menu");
toggleSpan.click(function(){
    off_canvas.animate({width: 'toggle'}, 400);
    $("#off-canvas-menu > div").toggle();
});


$(document).ready(function(){
	var textlength;
	$(".smallRankingWidget").each(function(){
		textlength = $(this).find(".name").text().length;
		console.log(textlength);
		if(textlength < 12) {
		   // Do noting 
		  } else if (textlength < 15) {
		      $(this).find(".name").css('font-size', '1.4em');
		  } else if (textlength > 15) {
		      $(this).find(".name").css('font-size', '1.3em');
		  }
	});
});