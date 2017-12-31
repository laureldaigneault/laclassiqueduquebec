var partnerDir = "img/partners/";

var speed = 0.1;


$(window).load(function(){ 
    setTimeout(function(){ movecnn(); }, 3000);
});
$('#member-gal').click(function(){
  $('html, body').animate({
      scrollTop:$('#se-subscribe').offset().top - 200
    }, 'slow');
})
$('#arrow-scroll').click(function(){
  $('html, body').animate({
      scrollTop:$('#se-subscribe').offset().top - 200
    }, 'slow');
})

function movecnn(){
  var c = document.getElementById("se-cnn-info-p");
  var i = document.getElementById("se-cnn-info");
  var wid = c.clientWidth;

  if(wid > 992){
    var vw = Math.max(document.documentElement.clientWidth, window.innerWidth || 0) - 350;
  } else {
    var vw = Math.max(document.documentElement.clientWidth, window.innerWidth || 0) - 150;
  }


  var actual = i.style.left;

  actual = actual.replace('px', '');


  if(actual<-(wid))
    actual=vw;
  i.style.left = actual-speed+"px"; 

  if(speed <2.5)
    speed+=0.1;

  // requestAnimationFrame(movecnn);
  setTimeout(function(){ movecnn(); }, 25);
}

