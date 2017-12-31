$(document).ready(function(){ 
  $( "#facebook-tab" ).click(function() {
    var e = document.getElementById("facebook-tab");
    console.log($(window).width())
    if ($(window).width() >= 992) {
	    if(e.classList.contains("tab-active"))
	      e.classList.remove("tab-active");
	    else
	      e.classList.add("tab-active");
	}
  });
});
$(window).resize(function(){ 
	var e = document.getElementById("facebook-tab");
	if ($(window).width() <= 992) {
		e.classList.add("no-transition");
		e.classList.remove("tab-active");
	} else {
		e.classList.remove("no-transition");
	}
});
