// woo products js starts

var ExadWooProducts = function( $scope, $ ) {
    var $exad_woo_products_init = $scope.find( '.exad-product-image-slider' );

    $exad_woo_products_init.slick({
        slidesToShow: 1,
        autoplay: false,
        dots: false,
        arrows: false
    } );
}

// woo products js ends
