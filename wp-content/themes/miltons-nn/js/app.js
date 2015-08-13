
// Home triggers

triggerSidebar = function(el){
  console.log(el);
};

$(document).ready( function(){

  svgeezy.init(false, 'png');

  $('section.waypoint').waypoint( function(){
    triggerSidebar(this);
    console.log('Triggered');
  });

});

$( window ).load( function(){
  $('.gallery').slick({
    slide: 'img'
  });
});