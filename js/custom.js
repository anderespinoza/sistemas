(function($) {
"use strict";

/* ==============================================
LOADER -->
=============================================== */

    $(window).load(function() {
        $('#loader').delay(600).fadeOut('slow');
        $('#loader-container').delay(600).fadeOut('slow');
        $('body').delay(600).css({'overflow':'visible'});
    })

/* ==============================================
ANIMATIONS -->
=============================================== */

    new WOW(
        { offset: 100 }
    ).init();

/* ==============================================
MENU HOVER -->
=============================================== */

    jQuery(function($) {
    if($(window).width()>769){
        $('.dropdown').hover(function() {
            $(this).find('.dropdown-menu').first().stop(true, true).delay(100).fadeIn();

        }, function() {
            $(this).find('.dropdown-menu').first().stop(true, true).delay(100).fadeOut();
        });
        $('.dropdown > a').click(function(){
            location.href = this.href;
        });
        }
    });

/* ==============================================
HEADER AFFIX -->
=============================================== */

    $('.header').affix({
        offset: {
        top: $('.header').height() }
    }); 
    
/* ==============================================
TOOLTIP -->
=============================================== */

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

/* ==============================================
CAROUSEL's -->
=============================================== */

    $('#featured').owlCarousel({
        loop:true,
        margin:30,
        nav:false,
        dots:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
            items:1
            }
        }
    })

    $('.testimonials').owlCarousel({
        loop:true,
        margin:30,
        nav:false,
        dots:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })

/* ==============================================
LIGHTBOX -->
=============================================== */

    jQuery('a[data-gal]').each(function() {
        jQuery(this).attr('rel', jQuery(this).data('gal'));
        });     
    jQuery("a[data-gal^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',slideshow:false,overlay_gallery: false,theme:'dark_square',social_tools:false,deeplinking:false});

/* ==============================================
REV SLIDER -->
=============================================== */
    jQuery(document).ready(function() {
        jQuery('#banner1').show().revolution(
                {
                dottedOverlay:"none",
                delay:16000,
                startwidth:1920,
                startheight:725,
                hideThumbs:200,
                thumbWidth:100,
                thumbHeight:50,
                thumbAmount:4,
                navigationType:"none",
                navigationArrows:"solo",
                navigationStyle:"preview4",
                touchenabled:"on",
                onHoverStop:"on",
                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false,
                parallax:"scroll",
                parallaxBgFreeze:"on",
                parallaxLevels:[10,20,30,40,50,60,70,80,90,100],
                keyboardNavigation:"off",
                navigationHAlign:"center",
                navigationVAlign:"bottom",
                navigationHOffset:0,
                navigationVOffset:20,
                soloArrowLeftHalign:"left",
                soloArrowLeftValign:"center",
                soloArrowLeftHOffset:20,
                soloArrowLeftVOffset:0,
                soloArrowRightHalign:"right",
                soloArrowRightValign:"center",
                soloArrowRightHOffset:20,
                soloArrowRightVOffset:0,
                shadow:0,
                fullWidth:"on",
                fullScreen:"off",
                spinner:"spinner4",
                stopLoop:"off",
                stopAfterLoops:-1,
                stopAtSlide:-1,
                shuffle:"off",
                autoHeight:"off",                       
                forceFullWidth:"off",                        
                hideThumbsOnMobile:"off",
                hideNavDelayOnMobile:1500,                      
                hideBulletsOnMobile:"off",
                hideArrowsOnMobile:"off",
                hideThumbsUnderResolution:0,
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                startWithSlide:0
        });                           
    }); //ready

    /* ==============================================
    ACCORDION -->
    =============================================== */

    function toggleChevron(e) {
        $(e.target)
            .prev('.panel-heading')
            .find("i.indicator")
            .toggleClass('fa-minus fa-plus');
    }
    $('#accordion').on('hidden.bs.collapse', toggleChevron);
    $('#accordion').on('shown.bs.collapse', toggleChevron);

    function toggleChevron(e) {
        $(e.target)
            .prev('.panel-heading')
            .find("i.indicator")
            .toggleClass('fa-minus fa-plus');
    }
    $('#accordion1').on('hidden.bs.collapse', toggleChevron);
    $('#accordion1').on('shown.bs.collapse', toggleChevron);
    
})(jQuery);
