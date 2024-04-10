
var exadLottieAnimation = function ( $scope, $ ) {
    var lottieWrapper = $scope.find( '.exad-lottie-animation' ).eq(0);

    var lottieSource = lottieWrapper.data("lottie-source");
    var lottieRenderer = lottieWrapper.data("lottie-renderer");
    var lottieLoop = lottieWrapper.data("lottie-loop");
    var lottieSpeed = lottieWrapper.data("lottie-speed");
    var lottieType = lottieWrapper.data("lottie-trigger");
    var lottiePath;
    var autoplay;

    function bindToScroll() {
        var scrollPercentRounded;  
        $(window).scroll(function() {
            var scrollPercent = 100 * $(window).scrollTop() / ($(document).height() - $(window).height());
            scrollPercentRounded = Math.round(scrollPercent);
            init.goToAndStop( (scrollPercentRounded / 100) * 4000);
        });
    }

    function elementInViewport(elem) {
        var documentViewTop = $(window).scrollTop();
        var documentViewBottom = documentViewTop + $(window).height();
    
        var elementTop = $(elem).offset().top;
        var elementBottom = elementTop;
    
        return ((elementBottom <= documentViewBottom) && (elementTop >= documentViewTop));
    }

    function viewportScroll() {
        $(window).scroll(function() {
            if ( elementInViewport( lottieWrapper ) ){
                init.play('exad-lottie');
            } else {
                init.stop('exad-lottie');
            }
        });

    }

    if ( lottieSource == 'exad_lottie_media_file' ) {
      lottiePath = lottieWrapper.data("lottie-source-json");;
    } else if ( lottieSource == 'exad_lottie_external_url' ) {
      lottiePath = lottieWrapper.data("external-source-url");
    }
    
    if ( lottieType === 'autoplay' ) {
      autoplay = true;
    } else if ( 'on_scroll' == lottieType || 'on_viewport' == lottieType ) {
      autoplay = false;
    }

    var animData = {
        container: lottieWrapper[0],
        renderer: lottieRenderer,
        loop: lottieLoop,
        autoplay: autoplay,
        path: lottiePath,
        name: 'exad-lottie'
    };
    
    var init = bodymovin.loadAnimation(animData);

    if ( 'on_hover' == lottieType ) {
        lottieWrapper.on("mouseenter", function(){
            init.goToAndPlay(0);
        });
    } else if ( 'on_click' == lottieType ) {
        lottieWrapper.on("click", function(){
            init.goToAndPlay(0);
        });
    } else if ('on_scroll' == lottieType) {
        bindToScroll();
    } else if ('on_viewport' == lottieType ) {
        viewportScroll();
    }

    init.setSpeed( lottieSpeed );

}

