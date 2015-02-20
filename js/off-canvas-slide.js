var toggleSpan = $("#toggle");
var off_canvas = $("#off-canvas-menu");
toggleSpan.click(function(){
    off_canvas.animate({width: 'toggle'}, 400);
    $("#off-canvas-menu > div").toggle();
});

var bar = $(".bar");

var clicking = false;
var offset = 0;
bar.mousedown(function(){
    clicking = true;
    offset = bar.offset();
});

$(document).mouseup(function(){
    clicking = false;
})
var positionX = 0;
var percentage = 0;
var sliderBar = $(".offCanvasSlider")
var offCanvasSliderBar = $(".offCanvasSliderBar");
bar.mousemove(function(event){
	if(clicking==false)return;
	position = event.pageX;
	// Mouse click + moving logic here
    percentage = ((position-offset.left)/offCanvasSliderBar.width())*100;
    $('#position').text(position + " " + offset.left + " " + offCanvasSliderBar.width() + " " + percentage);
    if(percentage<0.0)
    {
    	percentage = 0;
    }
    sliderBar.css("width",percentage + "%");
    bar.css("margin-left",percentage + "%");
});