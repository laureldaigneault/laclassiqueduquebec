/** *************Init JS*********************
	
    TABLE OF CONTENTS
	---------------------------
	Notify Me
	IE9 Pleaceholder Support
	Preloader
	Counter JS
	Youtube background
	Only play video on desktop devices
 ** ***************************************/
 "use strict"; 


/***********************************/
/*Ready function*/
/**********************************/
$(document).ready(function() {
	
	/** Subscribe JS **/
	$("#notifyMe").notifyMe(); // Activate notifyMe plugin on a '#notifyMe' element 
	
	/** Placeholder JS call **/
	$('input[type=text], textarea').placeholder();	
		
});


/***********************************/
/*Youtube background*/
/**********************************/

	var options = { videoId: 'zwYtR4q2_Wo',repeat: true }; /* you tube video id goes here.*/
	$('#background-video').tubular(options);

/***************************************/
/*only play video on desktop devices  */
/**************************************/
	var isMobile = {
	Android: function() {
	return navigator.userAgent.match(/Android/i);
	},
	BlackBerry: function() {
	return navigator.userAgent.match(/BlackBerry/i);
	},
	iOS: function() {
	return navigator.userAgent.match(/iPhone|iPad|iPod/i);
	},
	Opera: function() {
	return navigator.userAgent.match(/Opera Mini/i);
	},
	Windows: function() {
	return navigator.userAgent.match(/IEMobile/i);
	},
	any: function() {
	return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
	}
};

var trueMobile = isMobile.any()
if (trueMobile){
	 //    $('#background-video').css('display','none');
		// $('#background').css('display','none');
		// $('#tubular-container').css('display','none');
		// $('#tubular-shield').css('display','none');
		
}






