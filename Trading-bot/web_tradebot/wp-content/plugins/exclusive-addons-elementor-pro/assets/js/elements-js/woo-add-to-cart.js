// woo add to cart script starts

var exadWooAddToCart     = function( $scope, $ ) {
    var exadAddCart = $scope.find( '.exad-woo-mini-cart' ).eq(0);

    var cartVisibility = exadAddCart.data('visibility');

    var cartWrapper = exadAddCart.find( '.exad-woo-mini-cart-wrapper' );
    var cartIcon = exadAddCart.find( '.exad-woo-mini-cart-wrapper .exad-woo-cart-icon' );
    var cartBag = exadAddCart.find( '.exad-woo-mini-cart-wrapper .exad-woo-cart-bag' );
    var cartOverlay = exadAddCart.find( '.exad-woo-mini-cart-wrapper .exad-woo-cart-bag-fly-out-overlay' );

    if( 'hover' === cartVisibility ){
        $( cartWrapper ).hover( function()  {
            cartWrapper.addClass('hover-active');
        }, function() {
            cartWrapper.removeClass('hover-active');
        });
    }else if( 'click' === cartVisibility ){
        $(cartWrapper).on("click", function(e){
            cartWrapper.toggleClass('click-active');
        });
    } else if( 'fly-out' === cartVisibility ){
        var closeIcon = cartBag.find( '.exad-woo-cart-bag-fly-out-close-icon' );

        closeIcon.on("click", function(e){
            cartBag.removeClass('fly-out-active');
            cartOverlay.removeClass('fly-out-active');
        });
        $(cartIcon).on("click", function(e){
            cartBag.addClass('fly-out-active');
            cartOverlay.addClass('fly-out-active');
        });
        $(cartOverlay).on("click", function(e){
            cartBag.removeClass('fly-out-active');
            cartOverlay.removeClass('fly-out-active');
        });
    }
    
    
}

// woo add to cart script ends