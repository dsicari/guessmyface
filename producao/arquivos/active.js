/*
Author       : PerfectPixelWeb
Template Name: Portfolica - Personal Portfolio Template
Version      : 1.0
*/


(function($) {
    "use strict";

    jQuery(document).ready(function($) {


        /*
         * ----------------------------------------------------------------------------------------
         *  Typed JS
         * ----------------------------------------------------------------------------------------
         */
        Typed.new('#typed', {
            stringsElement: document.getElementById('typed-strings'),
            typeSpeed: 100,
            loop: true,
            startDelay: 1000,
            backDelay: 1000
        });

        /*
         * ----------------------------------------------------------------------------------------
         *  Sticky JS
         * ----------------------------------------------------------------------------------------
         */
        $(window).on('scroll', function() {
            var $stickyheader = $('#sticky-header');
            var scroll = $(window).scrollTop();
            if (scroll < 10) {
                $stickyheader.removeClass("sticky");
            } else {
                $stickyheader.addClass("sticky");
            }
        });

        /*
         * ----------------------------------------------------------------------------------------
         *  Smooth Scroll JS
         * ----------------------------------------------------------------------------------------
         */

        $('a.smooth-scroll').on("click", function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - 60
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });

        $('body').scrollspy({
            target: '.navbar-default',
            offset: 80
        })

        /*
         * ----------------------------------------------------------------------------------------
         *  Hiding toggle nav JS
         * ----------------------------------------------------------------------------------------
         */
        $(document).on('click', '.navbar-collapse.in', function(e) {
            if ($(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle') {
                $(this).collapse('hide');
            }
        });

        /*
         * ----------------------------------------------------------------------------------------
         *  Client feedback JS
         * ----------------------------------------------------------------------------------------
         */

        $(".feedback-area").owlCarousel({
            items: 1,
            autoPlay: 3000, //Set AutoPlay to 3 seconds
            navigation: false,
            itemsDesktop: [1199, 1],
            itemsDesktopSmall: [980, 1],
            itemsTablet: [768, 1],
            itemsTabletSmall: false,
            itemsMobile: [479, 1],
            pagination: false,
            autoHeight: true
        });

        /*
         * ----------------------------------------------------------------------------------------
         *  Partners JS
         * ----------------------------------------------------------------------------------------
         */

        $(".partners-logo").owlCarousel({
            autoPlay: 3000, //Set AutoPlay to 3 seconds
            items: 6,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3],
            pagination: false
        });


        /*
         * ----------------------------------------------------------------------------------------
         *  Counter up JS
         * ----------------------------------------------------------------------------------------
         */

        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });

        /*
         * ----------------------------------------------------------------------------------------
         *  Google map JS
         * ----------------------------------------------------------------------------------------
         */

        $("#gmap").gmap3({
            map: {
                options: {
                    center: [35.5397847, -97.5283396],
                    zoom: 5,
                    scrollwheel: false,
                    styles: [{
                        "stylers": [{
                            "hue": "#ffffff"
                        }, {
                            saturation: -110
                        }, {
                            gamma: 2
                        }]
                    }],
                }
            },
            marker: {
                latLng: [35.5397847, -97.5283396],
                options: {
                    icon: new google.maps.MarkerImage(
                        "assets/images/marker.png",
                        new google.maps.Size(48, 48, "px", "px")
                    )
                }
            }
        });

        /*
         * ----------------------------------------------------------------------------------------
         *  Wow JS
         * ----------------------------------------------------------------------------------------
         */

        new WOW().init();

    });




    jQuery(window).on('load', function() {

        /*
         * ----------------------------------------------------------------------------------------
         *  Preloader JS
         * ----------------------------------------------------------------------------------------
         */
        jQuery(".preloader-area").fadeOut(500);

    });

})(jQuery);