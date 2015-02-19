var toggleSpan = $("#toggle");
var off_canvas = $("#off-canvas-menu");
toggleSpan.click(function(){
    off_canvas.animate({width: 'toggle'}, 400);
    $("#off-canvas-menu > div").toggle();
});