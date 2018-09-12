//[Master Javascript]


//Template script here

(function($) {
    'use strict' ;

//loading

    // Wait for window load
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });



//slider
    var tpj=jQuery;

    var revapi1174;
    tpj(document).ready(function() {
        if(tpj("#rev_slider_1174_1").revolution == undefined){
            revslider_showDoubleJqueryError("#rev_slider_1174_1");
        }else{
            revapi1174 = tpj("#rev_slider_1174_1").show().revolution({
                sliderType:"hero",
                jsFileLocation:"revolution/js/",
                sliderLayout:"fullscreen",
                dottedOverlay:"none",
                delay:9000,
                navigation: {
                },
                responsiveLevels:[1240,1024,778,480],
                visibilityLevels:[1240,1024,778,480],
                gridwidth:[1240,1024,778,480],
                gridheight:[868,768,960,720],
                lazyType:"none",
                parallax: {
                    type:"scroll",
                    origo:"slidercenter",
                    speed:400,
                    levels:[10,15,20,25,30,35,40,-10,-15,-20,-25,-30,-35,-40,-45,55],
                    type:"scroll",
                },
                shadow:0,
                spinner:"off",
                autoHeight:"off",
                fullScreenAutoWidth:"off",
                fullScreenAlignForce:"off",
                fullScreenOffsetContainer: "100px",
                fullScreenOffset: "",
                disableProgressBar:"on",
                hideThumbsOnMobile:"off",
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                debugMode:false,
                fallbacks: {
                    simplifyAll:"off",
                    disableFocusListener:false,
                }
            });
        }
    });	/*ready*/



})(jQuery);// End of use strict

