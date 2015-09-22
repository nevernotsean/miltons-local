
// Home triggers

var winh, winw, isHome, isShop, isSmall;

winh = $(window).height();
winw = $(window).width();
isHome = $('body').hasClass('home');
isShop = $('body').hasClass('woocommerce');
isSmall = Foundation.utils.is_small_only();

introAnim = function(){
  tl = new TimelineMax();
  tl.to('.introLogo', 1, {opacity: "1", delay: 1})
  .to('.scrolldown', 0.5, {opacity: "1"})
  .to('.scrolldown', 1, {y: "10"});
};

setPanelsTriggers = function(){

  var hasSections = $('section.waypoint').length;

  if (hasSections && !isSmall) {

    var $masthead = $('.masthead-image'),
        $sidebar = $('#sidebar-bg'),
        $panels = $('panel'),
        $firstPanel = $('panel').first(),
        $firstSidebar = $firstPanel.find('.sidebar');

    expandSidebar = function(){
      // console.log('PING');

      TweenMax.to('#sidebar-bg', 0.5, {
        ease: Quart.easeOut,
        width: "40%"
      });

      if (isHome){
        TweenMax.from($firstSidebar, 1, {
          delay: 0.5,
          opacity: 0.4,
          ease: Linear.none
        });
      }

      TweenMax.to('.top-bar-container', 0.5, {
        yPercent: "0",
        onComplete: function(){
          TweenMax.set('.mask', { display: "block" });
        }
      });

      TweenMax.to('.introLogo', 1, { left: "30%", ease: Quart.easeOut});

      TweenMax.to('.scrolldown', 0.5, { opacity: "0" });

      // TweenMax.to($masthead, 0.8, {opacity: "0"});
    };

    closeSidebar = function(){
      // console.log('PING');
      TweenMax.set('.mask', { display: "none" });

      TweenMax.to('#sidebar-bg', 0.5, {
        ease: Quart.easeIn,
        width: "0%",
      });

      TweenMax.to('.top-bar-container', 0.5, { yPercent: "-100%" });

      TweenMax.to('.introLogo', 0.8, { left: "50%", ease: Quart.easeOut});

      TweenMax.to('.scrolldown', 0.5, { opacity: "1" });

      // TweenMax.to($masthead, 0.8, {opacity: "1"});
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
            // yPercent: "100%",
            opacity: "0",
            ease: Quart.easeIn
          }, {
            // yPercent: "0%"
            opacity: "1",
          });

        }

        if (direction == "up") {

          TweenMax.fromTo(image, 0.8,
          {
            // yPercent: "0%",
            opacity: "1",
            ease: Quart.easeOut
          }, {
            // yPercent: "100%"
            opacity: "0",
          });
        }
      }, {offset: "50%"});

    });
  }
};


// Shop Triggers

if (isShop && !isSmall) {
  $('section.container').waypoint( function(direction){
    if (direction == "down"){
      console.log('PING');
      TweenMax.to('.top-bar-container', 2, {className: "+=black"});
    }
    if (direction == "up"){
      console.log('PING');
      TweenMax.to('.top-bar-container', 2, {className: "-=black"});
    }
  }, {offset: "150"});
}


// Doc Ready
$(document).ready( function(){

  // Shop equalizer
  $('ul.products .product-title').matchHeight({
      byRow: true,
      property: 'height',
      target: null,
      remove: false
  });

  $('ul.products .product-descr').matchHeight({
      byRow: true,
      property: 'height',
      target: null,
      remove: false
  });

  $('ul.products > li').matchHeight({
      byRow: true,
      property: 'height',
      target: null,
      remove: false
  });

  // SVGeezy
  svgeezy.init(false, 'png');

  // SVG 4 errybody
  // svg4everybody();

  //SVG Inject
    // Elements to inject
  var mySVGsToInject = document.querySelectorAll('img.svg');

  // Do the injection
  SVGInjector(mySVGsToInject, {
    pngFallback: '../assets/img/'
  });



  // Desktop Animations - Get Ready

  if (!isSmall) {
     // Reset positons
    TweenMax.set('.left-image', {
      // yPercent: "100%",
      opacity: 0
    });

    if ( $('#sidebar-bg').length ) {
      TweenMax.set('#sidebar-bg', {width: "0%"});
      $('<div class="mask"></div>').appendTo('#tb-mask');
    }

    if (isHome) {
      TweenMax.set('.placeholder', {height: winh });
      TweenMax.set('.introLogo, .scrolldown', { xPercent: '-50%', yPercent: '-50%'});
      TweenMax.set('.top-bar-container', { yPercent: '-100%'});
    }

    if ( !window.location.hash.length ) {
      // console.log(!window.location.hash.length);
      TweenMax.set('body', { scrollTop: "0" });
    } else {
      console.log(!window.location.hash.length);
      TweenMax.set('#sidebar-bg', { width: "40%" });
      TweenMax.from('body', 2, { opacity: "0"});
      TweenMax.set('.top-bar-container', { yPercent: "0" });
      TweenMax.set('.mask', { display: "block" });
      TweenMax.set('.introLogo', { left: "30%", ease: Quart.easeOut});
    }

  } else if ( isSmall ) {
    $('#sidebar-bg').css('width', '0');
    TweenMax.set('.introLogo, .scrolldown', { xPercent: '-50%', yPercent: '-50%'});
  }

});

$( window ).load( function(){

  $('.scrolldown, .introLogo').css('opacity', '0');

  $(window).trigger('nofoucreveal');

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


$(window).on('nofoucreveal', function(){
  // GO

  TweenMax.to('body.no-fouc', 1, {
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

});