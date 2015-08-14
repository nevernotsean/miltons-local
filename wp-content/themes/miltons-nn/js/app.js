
// Home triggers

triggerSidebar = function(el){
  TweenMax.to(el, 3, {right: "100px"});
  console.log(el);
};

$(document).ready( function(){

  svgeezy.init(false, 'png');

  hasSections = $('section.waypoint').length;

  if (hasSections) {

    $('section.waypoint').each( function(){
      // $(this).find('.sidebar').css('right','100%');
    });

    $('section.waypoint').waypoint( function(direction){
      if (direction === 'down') {
        el = $(this).find('.sidebar');
        triggerSidebar(el);
      }
    });

  }

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