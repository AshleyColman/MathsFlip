// Hides the body when page loads first
$(function(){
    $("body").hide();
});

// Applies fade in animation for the hidden body 
$(function(){
    $("body").show("fade", 500);
});
   
// Slide down results page
$(function(){
  $('#results-wrapper').hide().slideDown(1800);
});

// Fade in highscore effect
$(function(){
    $("#highscore").hide().delay(1500).show("fade", 800);
});

// Fade out highscore effect
$(function(){
 $("#highscore").delay(800).fadeOut(800);
});



