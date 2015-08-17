
// Home triggers

var winh, winw, isHome;

winh = $(window).height();
winw = $(window).width();
isHome = $('body').hasClass('home');

introAnim = function(){

console.log(isHome);

};

setPanelsTriggers = function(){

  var hasSections = $('section.waypoint').length;

  if (hasSections) {

    var $masthead = $('.masthead-image'),
        $sidebar = $('#sidebar-bg'),
        $panels = $('panel'),
        $firstPanel = $('panel').first(),
        $firstSidebar = $firstPanel.find('.sidebar');

    expandSidebar = function(){
      console.log('PING');

      TweenMax.to('#sidebar-bg', 0.5, {
        ease: Quart.easeOut,
        width: "40%"
      });

      TweenMax.from($firstSidebar, 1, {
        delay: 0.5,
        opacity: 0,
        ease: Linear.none
      });
    },

    closeSidebar = function(){
      console.log('PING');
      TweenMax.to('#sidebar-bg', 0.5, {
        ease: Quart.easeIn,
        width: "0%"
      });
    };

    var colors = [
      '#444745',
      '#7A8157',
      '#FD8274',
      '#BFBCB1'
    ];

    randColor = function(){
      var rand = colors[Math.floor(Math.random() * colors.length - 1)];
      TweenMax.to('#sidebar-bg', 1, { backgroundColor: rand, ease: Quart.easeInOut });
    };

    // Close and Open the sidebar
    $firstPanel.waypoint( function(direction){
      if (direction === "up") { closeSidebar(); }
      if (direction === "down") { expandSidebar(); }
    }, { offset: winh - 50 });

    // Panel Triggers
    $panels.each( function(){

      $(this).waypoint( function(direction){

        var image = $(this.element).find('.left-image');

        // randColor();

        if (direction == "down") {

          TweenMax.fromTo(image, 0.8,
          {
            yPercent: "100%",
            ease: Quart.easeIn
          }, {
            yPercent: "0%"
          });

        }

        if (direction == "up") {

          TweenMax.fromTo(image, 0.8,
          {
            yPercent: "0%",
            ease: Quart.easeOut
          }, {
            yPercent: "100%"
          });
        }
      }, {offset: "50%"});

    });
  }
};


// Doc Ready
$(document).ready( function(){

  // SVGeezy
  svgeezy.init(false, 'png');

  // Reset positons
  $(window).scrollTop(0);
  TweenMax.set('.left-image', { yPercent: "100%" });
  TweenMax.set('#sidebar-bg', { width: "0" });
  TweenMax.set('.placeholder', {height: winh });

});

$( window ).load( function(){


  // GO

  TweenMax.fromTo('body.no-fouc', 1, {
    opacity: 0
  },{
    opacity: 1,
    onComplete: function(){
      // Remove no-fouc
      $('body.no-fouc').removeClass('no-fouc');

      // Start Intro
      introAnim();

      // Setup Panels
      setPanelsTriggers();
    }
  });




  // Shop Slider
  $('.gallery').slick({
    slide: 'img',
    arrows: false,
    // fade: true,
    autoplay: true,
    autoplaySpeed: 2000,
    cssEase: 'ease'
  });
});