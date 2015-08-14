
// Home triggers

winh = $(window).height();
$('.placeholder').css('height',winh);

triggerSidebar = function($el){
  TweenMax.to(el, 3, {right: "100px"});
  console.log(el);
};

triggerFixed = function(el){
  console.log(el);
};

$(document).ready( function(){

  svgeezy.init(false, 'png');

  hasSections = $('section.waypoint').length;

  if (hasSections) {
    var $sidebar = $('#sidebar');

    $('panel').each( function(){
      // $(this).find('.sidebar').css('right','100%');
    });

    $('panel').waypoint( function(direction){
      // if (direction === 'down') {
        section = $(this)[0].element;
        $(section).find('section.waypoint').toggleClass('active');
        // triggerFixed($section);
      // }
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