triggerSidebar=function(e){TweenMax.to(e,3,{right:"100px"}),console.log(e)},$(document).ready(function(){svgeezy.init(!1,"png"),hasSections=$("section.waypoint").length,hasSections&&($("section.waypoint").each(function(){}),$("section.waypoint").waypoint(function(e){"down"===e&&(el=$(this).find(".sidebar"),triggerSidebar(el))}))}),$(window).load(function(){$("body.no-fouc").removeClass("no-fouc"),$(".gallery").slick({slide:"img",arrows:!1,autoplay:!0,autoplaySpeed:2e3,cssEase:"ease"})});