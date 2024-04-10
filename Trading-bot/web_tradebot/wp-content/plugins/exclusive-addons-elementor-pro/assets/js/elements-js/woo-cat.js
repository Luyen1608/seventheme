// woo category script starts

var exclusiveProductCat     = function( $scope, $ ) {
    var exadcarouselWrapper = $scope.find( '.exad-woo-product-cat-slider' ).eq(0),
    carouselNav             = exadcarouselWrapper.data( 'carousel-nav' ),
    carouselColumn          = exadcarouselWrapper.data( 'carousel-column' ),
    slidesToScroll          = exadcarouselWrapper.data( 'slidestoscroll' ),
    transitionSpeed         = exadcarouselWrapper.data( 'carousel-speed' ),
    direction               = exadcarouselWrapper.data( 'direction' ),
    autoplaySpeed           = undefined !== exadcarouselWrapper.data( 'autoplayspeed' ) ? exadcarouselWrapper.data( 'autoplayspeed' ) : 3000,
    loop                    = undefined !== exadcarouselWrapper.data( 'loop' )  ? exadcarouselWrapper.data( 'loop' ) : false,
    autoPlay                = undefined !== exadcarouselWrapper.data( 'autoplay' ) ? exadcarouselWrapper.data( 'autoplay' ) : false,
    pauseOnHover            = undefined !== exadcarouselWrapper.data( 'pauseonhover' ) ? exadcarouselWrapper.data( 'pauseonhover' ) : false;

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
    
    exadcarouselWrapper.slick( {
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
                slidesToShow: 2
                }
            },
            {
                breakpoint: 576,
                settings: {
                slidesToShow: 1
                }
            }
        ]
    } );
}

// woo category script ends