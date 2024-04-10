// post carousel script starts

var exclusivePostCarousel = function( $scope, $ ) {
    var carouselWrapper   = $scope.find( '.exad-post-carousel' ).eq(0),
    carouselNav           = carouselWrapper.data( 'carousel-nav' ),
    carouselColumn        = carouselWrapper.data( 'carousel-column' ),
    slidesToScroll        = carouselWrapper.data( 'slidestoscroll' ),
    transitionSpeed       = carouselWrapper.data( 'carousel-speed' ),
    direction             = carouselWrapper.data( 'direction' ),
    autoplaySpeed         = undefined !== carouselWrapper.data( 'autoplayspeed' ) ? carouselWrapper.data( 'autoplayspeed' ) : 3000,
    loop                  = undefined !== carouselWrapper.data( 'loop' )  ? carouselWrapper.data( 'loop' ) : false,
    autoPlay              = undefined !== carouselWrapper.data( 'autoplay' ) ? carouselWrapper.data( 'autoplay' ) : false,
    pauseOnHover          = undefined !== carouselWrapper.data( 'pauseonhover' ) ? carouselWrapper.data( 'pauseonhover' ) : false;

    var arrows, dots;
    if ( 'both' === carouselNav ) {
        arrows = true;
        dots   = true;
    } else if ( 'arrows' === carouselNav ) {
        arrows = true;
        dots   = false;
    } else if ( 'dots' === carouselNav ) {
        arrows = false;
        dots   = true;
    } else {
        arrows = false;
        dots   = false;
    }
    
    carouselWrapper.slick( {
        slidesToShow: carouselColumn,
        slidesToScroll: slidesToScroll,
        arrows: arrows,
        dots: dots,
        autoplay: autoPlay,
        autoplaySpeed: autoplaySpeed,
        pauseOnHover: pauseOnHover,
        speed: transitionSpeed,
        infinite: loop,
        rtl: direction,
        prevArrow: '<div class="exad-carousel-nav-prev"><i class="eicon-chevron-left"></i></div>',
        nextArrow: '<div class="exad-carousel-nav-next"><i class="eicon-chevron-right"></i></div>',
        rows: 0,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    arrows: false
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    arrows: false
                }
            }
        ]
    } );
}

// post carousel script ends
