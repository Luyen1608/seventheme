// Image carousel starts

var exclusiveImageCarousel = function ($scope, $) {
    var imageCarouselWrapper = $scope.find(".exad-image-carousel-slider").eq(0),
        slidesToShow = imageCarouselWrapper.data("slides_to_show"),
        slidesToScroll = imageCarouselWrapper.data("slides_to_scroll"),
        carouselNav = imageCarouselWrapper.data("carousel_nav"),
        oriantation = imageCarouselWrapper.data("oriantation"),
        infiniteLoop = undefined !== imageCarouselWrapper.data("infinite_loop") ? imageCarouselWrapper.data("infinite_loop") : false,
        autoplay = undefined !== imageCarouselWrapper.data("autoplay") ? imageCarouselWrapper.data("autoplay") : false,
        autoplaySpeed = undefined !== imageCarouselWrapper.data("autoplayspeed") ? imageCarouselWrapper.data("autoplayspeed") : false,
        centerMode = undefined !== imageCarouselWrapper.data("center_mode") ? imageCarouselWrapper.data("center_mode") : false,
        centerPadding = undefined !== imageCarouselWrapper.data("center_padding") ? imageCarouselWrapper.data("center_padding") : false,
        slideFade = undefined !== imageCarouselWrapper.data("fade") ? imageCarouselWrapper.data("fade") : false,
        dotType = imageCarouselWrapper.data("dot_type"),
        prevArrow = $scope.find('.exad-image-carousel-prev'),
        nextArrow = $scope.find('.exad-image-carousel-next');

    var arrows, dots;
    if ("both" === carouselNav) {
        arrows = true;
        dots = true;
    } else if ("arrows" === carouselNav) {
        arrows = true;
        dots = false;
    } else if ("dots" === carouselNav) {
        arrows = false;
        dots = true;
    } else if ("none" === carouselNav) {
        arrows = false;
        dots = false;
    }
    
    var vertical, verticalSwiping;
    if ( "vertical" === oriantation ) {
        vertical = true;
        verticalSwiping = true;
    } else if ( "horizontal" === oriantation ) {
        vertical = false;
        verticalSwiping = false;
    }

    imageCarouselWrapper.slick({
        infinite: infiniteLoop,
        slidesToShow: slidesToShow,
        slidesToScroll: slidesToScroll,
        autoplay: autoplay,
        autoplaySpeed: autoplaySpeed,
        arrows: arrows,
        dots: dots,
        centerMode: centerMode,
        centerPadding: centerPadding+'px',
        fade: slideFade,
        vertical: vertical,
        verticalSwiping: verticalSwiping,
        prevArrow: prevArrow,
        nextArrow: nextArrow,
        customPaging: function ( slider, i ) {
            if(  'image' === dotType ){
                var image = $( slider.$slides[i] ).data( 'image' );
                return '<a><img src="' + image + '"></a>';
            }
            return;
        },
        responsive: [
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false,
                    centerPadding: 0,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false,
                    centerPadding: 0,
                }
            }
          ]
    });
};

// Image carousel ends