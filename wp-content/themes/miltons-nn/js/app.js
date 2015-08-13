
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
  $('body.no-fouc').removeClass('no-fouc');
  $('.gallery').slick({
    slide: 'img',
    arrows: false,
    // fade: true,
    autoplay: true,
    autoplaySpeed: 2000,
    cssEase: 'ease'
  });
});