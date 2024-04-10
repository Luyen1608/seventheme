// team carousel script starts

var exclusiveTeamCarousel     = function ( $scope, $ ) {
    var teamCarouselWrapper   = $scope.find( '.exad-team-carousel-wrapper' ).eq(0),
    carouselNav               = teamCarouselWrapper.data( 'carousel-nav' ),
    slidesToShow              = teamCarouselWrapper.data( 'slidestoshow'),
    slidesToScroll            = teamCarouselWrapper.data( 'slidestoscroll'),
    transitionSpeed           = teamCarouselWrapper.data( 'speed'),
    direction                 = teamCarouselWrapper.data( 'direction' ),
    autoplaySpeed             = undefined !== teamCarouselWrapper.data( 'autoplayspeed') ? teamCarouselWrapper.data( 'autoplayspeed' ) : 3000,
    loop                      = undefined !== teamCarouselWrapper.data( 'loop') ? teamCarouselWrapper.data( 'loop' ) : false,
    autoPlay                  = undefined !== teamCarouselWrapper.data( 'autoplay') ? teamCarouselWrapper.data( 'autoplay' ) : false,
    pauseOnHover              = undefined !== teamCarouselWrapper.data( 'pauseonhover') ? teamCarouselWrapper.data( 'pauseonhover' ) : false;

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

    teamCarouselWrapper.slick({
        infinite: loop,
        slidesToShow : slidesToShow,
        slidesToScroll: slidesToScroll,
        autoplay: autoPlay,
        autoplaySpeed: autoplaySpeed,
        speed: transitionSpeed,
        pauseOnHover: pauseOnHover,
        dots: dots,
        arrows: arrows,
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

// team carousel script ends