/*-----------------------------------------------------------------------------------

    Theme Name: Paw - Pet Adoption, Care and Shop Responsive Template
    Description: Pet Adoption, Care and Shop Responsive Template
    Author: Chitrakoot Web
    Version: 1.0

    /* ----------------------------------

    JS Active Code Index
            
        01. Preloader
        02. Sticky Header
        03. Scroll To Top
        04. Parallax
        05. Video
        06. Resize function
        07. FullScreenHeight function
        08. ScreenFixedHeight function
        09. ScreenFixedHeaderHeight function
        10. FullScreenHeight and screenHeight with resize function
        11. Sliders
        12. Tabs
        13. Countdown
        14. CountUp
        15. Isotop
        
    ---------------------------------- */    

(function($) {

    "use strict";

    var $window = $(window);

        /*------------------------------------
            01. Preloader
        --------------------------------------*/

        $('#preloader').fadeOut('normall', function() {
            $(this).remove();
        });

        /*------------------------------------
            02. Sticky Header
        --------------------------------------*/

        $window.on('scroll', function() {
            var scroll = $window.scrollTop();
             var logoinner = $(".navbar-brand img");
             var logowhite = $(".navbar-brand.logowhite img");
             if (scroll <= 50) {
                 $("header").removeClass("scrollHeader").addClass("fixedHeader");
                 logoinner.attr('src', 'img/logos/logo.png');
                 logowhite.attr('src', 'img/logos/logo-white.png');
             } 
             else {
                 $("header").removeClass("fixedHeader").addClass("scrollHeader");
                 logoinner.attr('src', 'img/logos/logo.png');
                 logowhite.attr('src', 'img/logos/logo.png');
             }
        });

        /*------------------------------------
            03. Scroll To Top
        --------------------------------------*/

        $window.on('scroll', function() {
            if ($(this).scrollTop() > 500) {
                $(".scroll-to-top").fadeIn(400);

            } else {
                $(".scroll-to-top").fadeOut(400);
            }
        });

        $(".scroll-to-top").on('click', function(event) {
            event.preventDefault();
            $("html, body").animate({
                scrollTop: 0
            }, 600);
        });

        /*------------------------------------
            04. Parallax
        --------------------------------------*/

        // sections background image from data background
        var pageSection = $(".parallax,.bg-img");
        pageSection.each(function(indx) {

            if ($(this).attr("data-background")) {
                $(this).css("background-image", "url(" + $(this).data("background") + ")");
            }
        });
        
        /*------------------------------------
            05. Video
        --------------------------------------*/

        $('.story-video').magnificPopup({
            delegate: '.video',
            type: 'iframe'
        });

        /*------------------------------------
            06. Resize function
        --------------------------------------*/

        $window.resize(function(event) {
            setTimeout(function() {
                SetResizeContent();
            }, 500);
            event.preventDefault();
        });

        /*------------------------------------
            07. FullScreenHeight function
        --------------------------------------*/

        function fullScreenHeight() {
            var element = $(".full-screen");
            var $minheight = $window.height();
            element.css('min-height', $minheight);
        }

        /*------------------------------------
            08. ScreenFixedHeight function
        --------------------------------------*/

        function ScreenFixedHeight() {
            var $headerHeight = $("header").height();
            var element = $(".screen-height");
            var $screenheight = $window.height();
            element.css('height', $screenheight);
        }

        /*------------------------------------
            09. ScreenFixedHeaderHeight function
        --------------------------------------*/

        function ScreenFixedHeaderHeight() {
            var $headerHeight = $("header").height();
            var element = $(".screen-height-header");
            var $screenheightheader = $window.height() - $headerHeight;
            element.css('height', $screenheightheader);
        }

        /*------------------------------------
            10. FullScreenHeight and screenHeight with resize function
        --------------------------------------*/        

        function SetResizeContent() {
            fullScreenHeight();
            ScreenFixedHeight();
            ScreenFixedHeaderHeight();
        }

        SetResizeContent();

    // === when document ready === //
    $(document).ready(function() {

        /*------------------------------------
            11. Sliders
        --------------------------------------*/

        // Testmonials carousel1
        $('#testmonials-carousel').owlCarousel({
            loop: true,
            responsiveClass: true,
            nav: true,
             navText: ["<i class='ti-arrow-left'></i>", "<i class='ti-arrow-right'></i>"],
            dots: false,
            autoplay: true,
            smartSpeed:500,
            margin: 0,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                768: {
                    items: 1
                },
                992: {
                    items: 1
                }
            }
        });     

        // Testmonials carousel1
        $('#testmonials2').owlCarousel({
            loop: true,
            responsiveClass: true,
            nav: false,
            navText: ["<i class='ti-arrow-left'></i>", "<i class='ti-arrow-right'></i>"],
            dots: false,
            autoplay: true,
            smartSpeed:500,
            margin: 0,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                768: {
                    items: 1
                },
                992: {
                    items: 2,
                    margin: 30
                }
            }
        });      

        // New-arrivals carousel
        $('#new-arrivals').owlCarousel({
            loop: true,
            responsiveClass: true,
            dots: true,
            nav: false,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            autoplay:true,
            smartSpeed:500,
            responsive: {
                0: {
                    items: 1,
                    margin: 0
                },
                481: {
                    items: 2,
                    margin: 15
                },
                768: {
                    items: 2,
                    margin: 20
                },
                992: {
                    items: 3,
                    margin: 25
                },
                1200: {
                    items: 4,
                    margin: 30
                }
            }
        });

        // Services carousel
        $('#blog-post').owlCarousel({
            loop: true,
            responsiveClass: true,
            dots: false,
            nav: true,
            autoplay:true,
            smartSpeed:500,
            responsive: {
                0: {
                    items: 1,
                    nav:false
                },
                768: {
                    items: 1
                },
                992: {
                    items: 1
                }
            }
        });

        // Carousel Style4
        $('.carousel-style4 .owl-carousel').owlCarousel({
            loop: true,
            dots: false,
            nav: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            autoplay: true,
            autoplayTimeout: 5000,
            responsiveClass: true,
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 1,
                    margin: 0
                },
                481: {
                    items: 2,
                    margin: 5
                },                
                500: {
                    items: 2,
                    margin: 20
                },
                992: {
                    items: 3,
                    margin: 30
                },
                1200: {
                    items: 4,
                    margin: 30
                }
            }
        });

        // Sliderfade
        $('.slider-fade .owl-carousel').owlCarousel({
            items: 1,
            loop:true,
            dots: false,
            margin: 0,
            nav: true,
            navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
            autoplay:true,
            smartSpeed:500,
            mouseDrag:false,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            responsive: {
                0: {
                    nav: false
                },
                768: {
                    nav: true,
                }
            }            
        });  

        // Default owlCarousel
        $('.owl-carousel').owlCarousel({
            items: 1,
            loop:true,
            dots: false,
            margin: 0,
            autoplay:true,
            smartSpeed:500
        });   

        // Slider text animation
        var owl = $('.slider-fade');
        owl.on('changed.owl.carousel', function(event) {
            var item = event.item.index - 2;     // Position of the current item
            $('h3').removeClass('animated fadeInRight');
            $('h1').removeClass('animated fadeInRight');
            $('p').removeClass('animated fadeInRight');
            $('.butn').removeClass('animated fadeInRight');
            $('.owl-item').not('.cloned').eq(item).find('h3').addClass('animated fadeInRight');
            $('.owl-item').not('.cloned').eq(item).find('h1').addClass('animated fadeInRight');
            $('.owl-item').not('.cloned').eq(item).find('p').addClass('animated fadeInRight');
            $('.owl-item').not('.cloned').eq(item).find('.butn').addClass('animated fadeInRight');
        });


        // Revolution slider2
        if ($("#rev_slider_1").length !== 0) {
            var tpj = jQuery;
            var revapi2;
            tpj(document).ready(function() {
                if (tpj("#rev_slider_1").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_1");
                } else {
                    revapi2 = tpj("#rev_slider_1").show().revolution({
                        sliderType: "standard",
                        sliderLayout: "fullwidth",
                        dottedOverlay: "none",
                        delay: 9000,
                        spinner: "spinner4",
                        navigation: {
                            keyboardNavigation: "off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            onHoverStop: "off",
                            touch: {
                                touchenabled: "on",
                                swipe_threshold: 75,
                                swipe_min_touches: 1,
                                swipe_direction: "horizontal",
                                drag_block_vertical: false
                            },
                            arrows: {
                                enable: true,
                                style: 'metis',
                                tmp: '',
                                rtl: false,
                                hide_onleave: true,
                                hide_onmobile: true,
                                hide_under: 0,
                                hide_over: 9999,
                                hide_delay: 200,
                                hide_delay_mobile: 1200,
                                left: {
                                    container: 'slider',
                                    h_align: 'left',
                                    v_align: 'center',
                                    h_offset: 20,
                                    v_offset: 0
                                },
                                right: {
                                    container: 'slider',
                                    h_align: 'right',
                                    v_align: 'center',
                                    h_offset: 20,
                                    v_offset: 0
                                }
                            },
                            bullets: {
                                enable: false,
                            },
                        },
                        responsiveLevels: [1240, 1024, 767, 480],
                        gridwidth: [1170, 1170, 767, 480],
                        gridheight: [700, 700, 600, 600],
                        lazyType: "none",
                        shadow: 0,
                        shuffle: "off",
                        autoHeight: "off",
                    });
                }
            });
        }

        // Revolution slider4
        if ($("#rev_slider_2").length !== 0) {
            var tpj = jQuery;
            var revapi4;
            tpj(document).ready(function() {
                if (tpj("#rev_slider_2").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_2");
                } else {
                    revapi4 = tpj("#rev_slider_2").show().revolution({
                        sliderType: "standard",
                        sliderLayout: "fullwidth",
                        dottedOverlay: "none",
                        delay: 9000,
                        spinner: "spinner4",
                        navigation: {
                            keyboardNavigation: "off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            onHoverStop: "off",
                            touch: {
                                touchenabled: "on",
                                swipe_threshold: 75,
                                swipe_min_touches: 1,
                                swipe_direction: "horizontal",
                                drag_block_vertical: false
                            },
                            arrows: {
                                enable: true,
                                style: 'metis',
                                tmp: '',
                                rtl: false,
                                hide_onleave: true,
                                hide_onmobile: true,
                                hide_under: 0,
                                hide_over: 9999,
                                hide_delay: 200,
                                hide_delay_mobile: 1200,
                                left: {
                                    container: 'slider',
                                    h_align: 'left',
                                    v_align: 'center',
                                    h_offset: 20,
                                    v_offset: 0
                                },
                                right: {
                                    container: 'slider',
                                    h_align: 'right',
                                    v_align: 'center',
                                    h_offset: 20,
                                    v_offset: 0
                                }
                            },
                            bullets: {
                                enable: false,
                            },
                        },
                        responsiveLevels: [1240, 1024, 767, 480],
                        gridwidth: [1280, 1170, 767, 480],
                        gridheight: [700, 700, 600, 600],
                        lazyType: "none",
                        shadow: 0,
                        shuffle: "off",
                        autoHeight: "off",
                    });
                }
            });
        }


        /*------------------------------------
            12. Tabs
        --------------------------------------*/

        //Horizontal Tab
        if ($(".horizontaltab").length !== 0) {
            $('.horizontaltab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion
                width: 'auto', //auto or any width like 600px
                fit: true, // 100% fit in a container
                tabidentify: 'hor_1', // The tab groups identifier
                activate: function(event) { // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $('#nested-tabInfo');
                    var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
                }
            });
        }

        /*------------------------------------
            13. Countdown
        --------------------------------------*/

        if ($(".countdown").length !== 0) {
            var tpj = jQuery;
            var countdown;
            tpj(document).ready(function() {
                if (tpj(".countdown").countdown == undefined) {
                    revslider_showDoubleJqueryError(".countdown");
                } else {
                    countdown = tpj(".countdown").show().countdown({
                        date: "01 Jan 2021 00:01:00", //set your date and time. EX: 15 May 2014 12:00:00
                        format: "on"
                    });
                }
            });
        }

        /*------------------------------------
            14. CountUp
        --------------------------------------*/

        $('.countup').counterUp({
            delay: 25,
            time: 2000
        });
        
    });


    // === when window loading === //
    $window.on("load", function() {

        /*------------------------------------
            15. Isotop
        --------------------------------------*/

        // isotope with magnificPopup
        $('.gallery').magnificPopup({
            delegate: '.popimg',
            type: 'image',
            gallery: {
                enabled: true
            }
        });

        var $gallery = $('.gallery').isotope({
            // options
        });

        // filter items on button click
        $('.filtering').on('click', 'span', function() {
            var filterValue = $(this).attr('data-filter');
            $gallery.isotope({
                filter: filterValue
            });
        });

        $('.filtering').on('click', 'span', function() {
            $(this).addClass('active').siblings().removeClass('active');
        });

        // stellar
        $window.stellar();

    });

})(jQuery);
