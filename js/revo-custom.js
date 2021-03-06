(function ($) {
    "use strict";
    jQuery(document).ready(function() {

        /*==================================================================
        [ Revo1 ]*/
        var screenH1 = 0;
        if ($(window).width() > 992) {
            screenH1 = $(window).height();
        }
        else {
            screenH1 = $(window).height() - 90;
        }

        jQuery('#rev_slider_1').show().revolution({
            
            responsiveLevels: [1200, 992, 768, 576],
            gridwidth:[1200, 992, 768, 576],
            minHeight: screenH1,
            delay: 7000,

            sliderLayout: 'fullwidth',
            spinner: 'spinner2',

            navigation: {

                keyboardNavigation: 'on',
                keyboard_direction: 'horizontal',
                onHoverStop: 'off',

                touch: {
 
                    touchenabled: 'on',
                    swipe_threshold: 75,
                    swipe_min_touches: 1,
                    swipe_direction: 'horizontal',
                    drag_block_vertical: true
             
                },
 
                arrows: {
                    enable: true,
                    style: 'gyges',
                    hide_onleave: true,
                    hide_onmobile: true,
                    left: {
                        container: 'slider',
                        h_align: 'left',
                        v_align: 'center',
                        h_offset: 50,
                        v_offset: 0
                    },
             
                    right: {
                        container: 'slider',
                        h_align: 'right',
                        v_align: 'center',
                        h_offset: 50,
                        v_offset: 0
                    }
                },
 
                bullets: {
                    enable: false,
                    style: 'uranus',
                    tmp: '<span class="tp-bullet-inner"></span>',
                    hide_onleave: false,
                    h_align: 'center',
                    v_align: 'bottom',
                    h_offset: 0,
                    v_offset: 50,
                    space: 10
                }
            }
        });

        /*==================================================================
        [ Revo2 ]*/
        jQuery('#rev_slider_2').show().revolution({
            
            responsiveLevels: [1200, 992, 768, 576],
            gridwidth:[1200, 992, 768, 576],
            gridheight:[650, 650, 650, 650],
            delay: 7000,
            
            sliderLayout: 'fullwidth',
            spinner: 'spinner2',

            navigation: {

                keyboardNavigation: 'on',
                keyboard_direction: 'horizontal',
                onHoverStop: 'off',

                touch: {
 
                    touchenabled: 'on',
                    swipe_threshold: 75,
                    swipe_min_touches: 1,
                    swipe_direction: 'horizontal',
                    drag_block_vertical: true
             
                },
 
                arrows: {
                    enable: true,
                    style: 'gyges',
                    hide_onleave: true,
                    hide_onmobile: true,
                    left: {
                        container: 'slider',
                        h_align: 'left',
                        v_align: 'center',
                        h_offset: 50,
                        v_offset: 0
                    },
             
                    right: {
                        container: 'slider',
                        h_align: 'right',
                        v_align: 'center',
                        h_offset: 50,
                        v_offset: 0
                    }
                },
 
                bullets: {
                    enable: false,
                    style: 'uranus',
                    tmp: '<span class="tp-bullet-inner"></span>',
                    hide_onleave: false,
                    h_align: 'center',
                    v_align: 'bottom',
                    h_offset: 0,
                    v_offset: 50,
                    space: 10
                }
            }
        });

        /*==================================================================
        [ Revo3 ]*/
        var screenH3 = 0;
        if ($(window).width() > 992) {
            screenH3 = $(window).height() - 140;
        }
        else {
            screenH3 = $(window).height() - 90;
        }


        jQuery('#rev_slider_3').show().revolution({
            
            responsiveLevels: [1900, 1200, 992, 576],
            gridwidth:[1900, 1200, 992, 576],
            minHeight: screenH3,
            delay: 7000,
            
            sliderLayout: 'fullwidth',
            spinner: 'spinner2',

            navigation: {

                keyboardNavigation: 'on',
                keyboard_direction: 'horizontal',
                onHoverStop: 'off',

                touch: {
 
                    touchenabled: 'on',
                    swipe_threshold: 75,
                    swipe_min_touches: 1,
                    swipe_direction: 'horizontal',
                    drag_block_vertical: true
             
                },
 
                arrows: {
                    enable: true,
                    style: 'gyges',
                    hide_onleave: true,
                    hide_onmobile: true,
                    left: {
                        container: 'slider',
                        h_align: 'left',
                        v_align: 'center',
                        h_offset: 50,
                        v_offset: 0
                    },
             
                    right: {
                        container: 'slider',
                        h_align: 'right',
                        v_align: 'center',
                        h_offset: 50,
                        v_offset: 0
                    }
                },
 
                bullets: {
                    enable: false,
                    style: 'uranus',
                    tmp: '<span class="tp-bullet-inner"></span>',
                    hide_onleave: false,
                    h_align: 'center',
                    v_align: 'bottom',
                    h_offset: 0,
                    v_offset: 50,
                    space: 10
                }
            }
        });
    });



})
(jQuery);