// slider js starts heres

var exclusiveSlider = function($scope, $) {
    var exadSliderControls = $scope.find( '.exad-slider' ).eq(0),
    sliderNav              = exadSliderControls.data( 'slider-nav' ),
    direction              = exadSliderControls.data( 'direction' ),
    transitionSpeed        = exadSliderControls.data( 'slider-speed' ),
    autoPlay               = undefined !== exadSliderControls.data( 'autoplay' ) ? exadSliderControls.data( 'autoplay' ) : false,
    pauseOnHover           = undefined !== exadSliderControls.data( 'pauseonhover' ) ? exadSliderControls.data( 'pauseonhover' ) : false,
    enableFade             = undefined !== exadSliderControls.data( 'enable-fade' ) ? exadSliderControls.data( 'enable-fade' ) : false,
    vertically             = undefined !== exadSliderControls.data( 'slide-vertically' ) ? exadSliderControls.data( 'slide-vertically' ) : false,
    centermode             = undefined !== exadSliderControls.data( 'centermode' ) ? exadSliderControls.data( 'centermode' ) : false,
    loop                   = undefined !== exadSliderControls.data( 'loop' ) ? exadSliderControls.data( 'loop' ) : false,
    autoplaySpeed          = undefined !== exadSliderControls.data( 'autoplayspeed' ) ? exadSliderControls.data( 'autoplayspeed' ) : '',
    dotsType               = undefined !== exadSliderControls.data( 'dots-type' ) ? exadSliderControls.data( 'dots-type' ) : '',
    centerModePadding      = undefined !== exadSliderControls.data( 'centermode-padding' ) ? exadSliderControls.data( 'centermode-padding' ) : '';
    
    var arrows, dots, verticalSwipe;
    if ( 'both' === sliderNav ) {
        arrows = true;
        dots   = true;
    } else if ( 'arrows' === sliderNav ) {
        arrows = true;
        dots   = false;
    } else if ( 'dots' === sliderNav ) {
        arrows = false;
        dots   = true;
    } else {
        arrows = false;
        dots   = false;
    }

    if( true === vertically ) {
    	verticalSwipe = true;
    } else {
    	verticalSwipe = false;
    }

    exadSliderControls.slick( {
        slidesToShow: 1,
        arrows: arrows,
        dots: dots,
        autoplay: autoPlay,
        fade: enableFade,
        centerMode: centermode,
  		centerPadding: centerModePadding,
        vertical: vertically,
        verticalSwiping: verticalSwipe,
        pauseOnHover: pauseOnHover,
        infinite: loop,
        rtl: direction,
        autoplaySpeed: autoplaySpeed,
        speed: transitionSpeed,
        customPaging: function ( slider, i ) {
            if(  'dot-image' === dotsType ){
                var image = $( slider.$slides[i] ).data( 'image' );
                return '<a><img src="' + image + '"></a>';
            }
            return;
        },
        responsive: [
            {
              breakpoint: 991,
              settings: {
                centerPadding: 0,
              }
            },
          ]
    } );

    exadSliderControls.slickAnimation();
}
// slider js starts ends
