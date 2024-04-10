// testimonial carousel starts

var exclusiveTestimonialCarousel   = function ( $scope, $ ) {
    var testimonialCarouselWrapper = $scope.find( '.exad-testimonial-carousel-wrapper' ).eq(0),
    carouselNav                    = testimonialCarouselWrapper.data( 'carousel-nav' ),
    slidesToShow                   = testimonialCarouselWrapper.data( 'slidestoshow' ),
    slidesToScroll                 = testimonialCarouselWrapper.data( 'slidestoscroll' ),
    transitionSpeed                = testimonialCarouselWrapper.data( 'speed' ),
    direction                      = testimonialCarouselWrapper.data( 'direction' ),
    autoplaySpeed                  = undefined !== testimonialCarouselWrapper.data( 'autoplayspeed' ) ? testimonialCarouselWrapper.data( 'autoplayspeed' ) : 3000,
    loop                           = undefined !== testimonialCarouselWrapper.data( 'loop' ) ? testimonialCarouselWrapper.data( 'loop' ) : false,
    autoPlay                       = undefined !== testimonialCarouselWrapper.data( 'autoplay' ) ? testimonialCarouselWrapper.data( 'autoplay' ) : false,
    pauseOnHover                   = undefined !== testimonialCarouselWrapper.data( 'pauseonhover' ) ? testimonialCarouselWrapper.data( 'pauseonhover' ) : false;
	
    var arrows, dots;
	if ( 'both' === carouselNav ) {
        arrows = true;
        dots   = true;
    } else if ( 'arrows' === carouselNav ) {
        arrows = true;
        dots   = false;
    } else if ( 'nav-dots' === carouselNav ) {
        arrows = false;
        dots   = true;
    } else if ( 'none' === carouselNav ) {
        arrows = false;
        dots   = false;
    }

    testimonialCarouselWrapper.slick({
        infinite: loop,
        slidesToShow: slidesToShow,
        slidesToScroll: slidesToScroll,
        autoplay: autoPlay,
        autoplaySpeed: autoplaySpeed,
        speed: transitionSpeed,
        pauseOnHover: pauseOnHover,
        rtl: direction,
        centerPadding: '0',
        dots: dots,
        arrows: arrows,
        prevArrow: '<div class="exad-carousel-nav-prev"><i class="eicon-chevron-left"></i></div>',
        nextArrow: '<div class="exad-carousel-nav-next"><i class="eicon-chevron-right"></i></div>',
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

// testimonial carousel ends
