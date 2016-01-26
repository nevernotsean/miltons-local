// Home triggers

var winh, winw, isHome, isShop, isSmall;

winh = $(window).height();
winw = $(window).width();
siteURI = $('body').attr('data-uri');
isHome = $('body').hasClass('home');
isShop = $('body').hasClass('woocommerce-page');
isOnePageTemplate = $('#sidebar-bg').length;
isSinglePost = $('body.single-post').length;
isFarmersPage = $('body.page-template-page-farmers-php').length;
isSmall = Foundation.utils.is_small_only();

introAnim = function() {
    tl = new TimelineMax();
    tl
        .set('.masthead', {
            zIndex: 1
        })
        .to('.introLogo', 1, {
            opacity: "1",
            delay: 1
        })
        .to('.js-scroll-down', 0.5, {
            opacity: "1"
        });
    // .to('.js-scroll-down', 1, {
    //     y: "10",
    //     yoyo: true,
    //     repeat: -1
    // });
};

setPanelsTriggers = function() {

    var hasSections = $('section.waypoint').length,
        $masthead = $('.masthead-image'),
        $sidebar = $('#sidebar-bg'),
        $panels = $('panel'),
        $firstPanel = $('panel').first(),
        $firstPanelPostition = $firstPanel.position().top,
        $firstSidebar = $firstPanel.find('.sidebar');

    expandSidebar = function() {

        TweenMax.to('#sidebar-bg', 0.5, {
            ease: Quart.easeOut,
            width: "40%"
        });

        if (isHome) {
            TweenMax.from($firstSidebar, 1, {
                delay: 0.5,
                opacity: 0.4,
                ease: Linear.none
            });

            TweenMax.set('.masthead', {
                clearProps: "all"
            });
        }

        TweenMax.to('.top-bar-container', 0.5, {
            yPercent: "0",
            onComplete: function() {
                TweenMax.set('.mask', {
                    display: "block"
                });
            }
        });

        TweenMax.to('.introLogo', 1, {
            left: "30%",
            ease: Quart.easeOut
        });

        TweenMax.to('.scrolldown', 0.5, {
            opacity: "0"
        });

    };

    closeSidebar = function() {

        TweenMax.set('.mask', {
            display: "none"
        });

        TweenMax.to('#sidebar-bg', 0.5, {
            ease: Quart.easeIn,
            width: "0%",
        });

        if (isHome) {
            TweenMax.set('.masthead', {
                zIndex: 1
            });
        }

        TweenMax.to('.top-bar-container', 0.5, {
            yPercent: "-100%"
        });

        TweenMax.to('.introLogo', 0.8, {
            left: "50%",
            ease: Quart.easeOut
        });

        TweenMax.to('.scrolldown', 0.5, {
            opacity: "1"
        });

    };

    if (hasSections && !isSmall) {

        // Close and Open the sidebar
        $firstPanel.waypoint(function(direction) {
            if (direction === "up") {
                closeSidebar();
            }
            if (direction === "down") {
                expandSidebar();
            }
        }, {
            offset: winh - 50
        });

        // Panel Triggers
        $panels.each(function() {

            $(this).waypoint(function(direction) {

                var image = $(this.element).find('.left-image');

                if (direction == "down") {

                    TweenMax.fromTo(image, 0.8, {
                        opacity: "0",
                        ease: Quart.easeIn
                    }, {
                        opacity: "1",
                    });

                }

                if (direction == "up") {

                    TweenMax.fromTo(image, 0.8, {
                        opacity: "1",
                        ease: Quart.easeOut
                    }, {
                        opacity: "0",
                    });
                }
            }, {
                offset: "50%"
            });

        });
    }

    // Down arrow listener
    $('.js-scroll-down').on('touchstart click', function(e) {
        e.preventDefault();
        console.log('ping');
        $('html body').animate({
            scrollTop: $firstPanelPostition
        }, 1000, 'swing');
    });
};


// TopNav Color Triggers

if (!isOnePageTemplate && !isSinglePost) {
    if (!isSmall) {
        // console.log('isShop!');
        $('section.container').waypoint(function(direction) {
            if (direction == "down") {
                // console.log('PING');
                $('.top-bar-container').addClass('black');
            }
            if (direction == "up") {
                // console.log('PING');
                $('.top-bar-container').removeClass('black');
            }
        }, {
            offset: "150"
        });
    }
} else if (isSinglePost) {
    if (!isSmall) {

        var resizeSidebar = (function() {
            var sidebarWidth = $('.recipe-sidebar').width();
            $('.sidebar-container').width(sidebarWidth);
            $(window).on('resize', function() {
                if (Foundation.utils.is_small_only()) {
                    return;
                }
                sidebarWidth = $('.recipe-sidebar').width();
                $('.sidebar-container').width(sidebarWidth);
            });
        })();

        $('[role="main"]').waypoint(function(direction) {
            if (direction == "down") {
                $('.top-bar-container').addClass('black');
                $('.sidebar-container').addClass('sticky');
            }
            if (direction == "up") {
                $('.top-bar-container').removeClass('black');
                $('.sidebar-container').removeClass('sticky');
            }
        }, {
            offset: "0"
        });
    }
}

// Farmers Map
(function($) {

    function new_map($el) {

        // var
        var $markers = $('.marker');


        // vars
        var args = {
            zoom: 10,
            center: new google.maps.LatLng(37.5333, 77.4667),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDefaultUI: true
        };


        // create map
        var map = new google.maps.Map($el[0], args);


        // add a markers reference
        map.markers = [];


        // add markers
        $markers.each(function() {

            add_marker($(this), map);

        });


        // center map
        center_map(map);


        // return
        return map;

    }

    function add_marker($marker, map) {

        // var
        var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng')),
            id = $marker.attr('data-id');

        // create marker
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            id: id,
            icon: siteURI + '/assets/img/icons/star.png'
        });

        console.log(marker.icon);

        // add to array
        map.markers.push(marker);

        // if marker contains HTML, add it to an infoWindow
        if ($marker.html()) {

            // create info window
            var infowindow = new google.maps.InfoWindow({
                content: $marker.html()
            });

            // show info window when marker is clicked
            google.maps.event.addListener(marker, 'click', function() {

                infowindow.open(map, marker);

                map.panTo(marker.position);
                // console.dir(marker.position);

            });

            //Close the info window on pan
            // if ( Foundation.utils.is_medium_up() ) {
            google.maps.event.addListener(map, 'center_changed', function() {
                infowindow.close();
            });
            // }

            // Center on the marker when hovering the list item

            $('.sidebar-locked .marker[data-id="' + marker.id + '"]').on('mouseenter click', function() {

                if (infowindow) {
                    infowindow.close();
                }

                map.panTo(marker.position);

                infowindow.open(map, marker);

            });
        }

    }

    function center_map(map) {

        // vars
        var bounds = new google.maps.LatLngBounds();

        // loop through all markers and create bounds
        $.each(map.markers, function(i, marker) {

            var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());

            bounds.extend(latlng);

        });

        // only 1 marker?
        if (map.markers.length == 1) {
            // set center of map
            map.setCenter(bounds.getCenter());
            map.setZoom(16);
        } else {
            // fit to bounds
            map.fitBounds(bounds);
        }

    }
    var map = null;

    $(window).on('load', function() {

        $('.acf-map').each(function() {
            // create map
            map = new_map($(this));
        });

    });

})(jQuery);


// Doc Ready
$(document).ready(function() {

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

    // SVG Inject
    var mySVGsToInject = document.querySelectorAll('img.svg');

    // Do the injection
    SVGInjector(mySVGsToInject, {
        pngFallback: '../assets/img/'
    });



    // Desktop Animations - Get Ready

    if (!isSmall) {
        // Reset positons
        TweenMax.set('.left-image', {
            opacity: 0
        });

        if ($('#sidebar-bg').length) {
            TweenMax.set('#sidebar-bg', {
                width: "0%"
            });
            $('<div class="mask"></div>').appendTo('#tb-mask');
        }

        if (isHome) {
            TweenMax.set('.placeholder', {
                height: winh
            });
            TweenMax.set('.introLogo, .js-scroll-down', {
                xPercent: '-50%',
                yPercent: '-50%'
            });
            TweenMax.set('.top-bar-container', {
                yPercent: '-100%'
            });
        }

        if (!window.location.hash.length) {
            // console.log(!window.location.hash.length);
            TweenMax.set('body', {
                scrollTop: "0"
            });
        } else {
            console.log(!window.location.hash.length);
            TweenMax.set('#sidebar-bg', {
                width: "40%"
            });
            TweenMax.from('body', 2, {
                opacity: "0"
            });
            TweenMax.set('.top-bar-container', {
                yPercent: "0"
            });
            TweenMax.set('.mask', {
                display: "block"
            });
            TweenMax.set('.introLogo', {
                left: "30%",
                ease: Quart.easeOut
            });
        }

    } else if (isSmall) {
        $('#sidebar-bg').css('width', '0');
        TweenMax.set('.introLogo, .js-scroll-down', {
            xPercent: '-50%',
            yPercent: '-50%'
        });
    }

});

$(window).load(function() {

    $('.js-scroll-down, .introLogo').css('opacity', '0');

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

    // Single Post Slider
    $('.recipe-gallery').slick({
        slide: 'img',
        arrows: false,
        // fade: true,
        autoplay: true,
        autoplaySpeed: 2000,
        cssEase: 'ease'
    });

    $(document).foundation({
        equalizer: {
            // Specify if Equalizer should make elements equal height once they become stacked.
            equalize_on_stack: false,
            // Allow equalizer to resize hidden elements
            act_on_hidden_el: true
        }
    });
});


$(window).on('nofoucreveal', function() {
    // GO

    TweenMax.to('body.no-fouc', 1, {
        opacity: 1,
        onComplete: function() {
            // Remove no-fouc
            $('body.no-fouc').removeClass('no-fouc');

            // Start Intro
            introAnim();

            // Setup Panels
            setPanelsTriggers();
        }
    });

});


// Pinterest
(function(d) {
    var f = d.getElementsByTagName('SCRIPT')[0],
        p = d.createElement('SCRIPT');
    p.type = 'text/javascript';
    p.async = true;
    p.src = '//assets.pinterest.com/js/pinit.js';
    f.parentNode.insertBefore(p, f);
}(document));