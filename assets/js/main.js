var hash = "#action";
$(document).ready(function(){
  $('html, body').animate({
     scrollTop: $(hash).offset().top
   }, 500, function(){

     // when done, add hash to url
     // (default click behaviour)
     window.location.hash = hash;
   });
  
});    