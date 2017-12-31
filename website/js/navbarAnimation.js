
// Changing the color of the navbar when scrolling
$(document).ready(function(){       
  if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $(".navbar-default").css('background-color', 'rgba(0,0,0,0.9)');
  } else {
     var scroll_start = 0;
     var offset = 1000;
     $(document).scroll(function() { 
        scroll_start = $(this).scrollTop();
        if(scroll_start > offset) {
            $(".navbar-default").css('background-color', 'rgba(0,0,0,0.9)');
         } else {
            $('.navbar-default').css('background-color', 'rgba(0,0,0,0.3)');
         }
     });
   }
});