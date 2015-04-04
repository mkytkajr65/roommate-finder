$(document).ready(function(){
	$(".profileName").each(function(){
		textlength = $(this).find(".profileLink").text().length;
		console.log(textlength);
		if(textlength > 0 && textlength < 5) {
		   $(this).removeClass("col-md-5");
		    $(this).addClass("col-md-3"); 
		  } else if (textlength < 10) {
		    $(this).removeClass("col-md-5");
		    $(this).addClass("col-md-4"); 
		  } else if (textlength < 15) {
		    //nothing
		  }else if(textlength < 20){
		  	$(this).removeClass("col-md-5");
		    $(this).addClass("col-md-6"); 
		  }else if(textlength < 25){
		  	$(this).removeClass("col-md-5");
		    $(this).addClass("col-md-7"); 
		  }else if(textlength < 30){
		  	$(this).removeClass("col-md-5");
		    $(this).addClass("col-md-8"); 
		  }else if(textlength < 35){
		  	$(this).removeClass("col-md-5");
		    $(this).addClass("col-md-9"); 
		  }else if(textlength < 40){
		  	$(this).removeClass("col-md-5");
		    $(this).addClass("col-md-10"); 
		  }else if(textlength > 40){
		  	$(this).removeClass("col-md-5");
		    $(this).addClass("col-md-11"); 
		  }

	});
});