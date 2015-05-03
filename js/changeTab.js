$("#prevTab").click(function(){
	$('.nav-tabs > .active').prev('li').find('a').trigger('click');
});

$("#nextTab").click(function(){
	$('.nav-tabs > .active').next('li').find('a').trigger('click');
});