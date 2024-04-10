
// Woo cart Js Start 

var exadWooCart = function( $scope, $ ) {
    var exadCartWrapper = $scope.find( '.exad-woo-cart' );

    var inputClass = $scope.find( '.exad-woo-cart .woocommerce-cart-form__contents tbody tr td.product-quantity .quantity input.qty' );

    $( '<button class="exad-quantity-minus-btn"></button>' ).insertBefore( inputClass );
    $( '<button class="exad-quantity-plus-btn"></button>' ).insertAfter( inputClass );

    var minusButton = $scope.find( '.exad-quantity-minus-btn' );
    var plusButton = $scope.find( '.exad-quantity-plus-btn' );

    minusButton.click(function (e) { 
        e.preventDefault();
        this.parentNode.querySelector('input[type=number]').stepDown();
    });
    plusButton.click(function (e) { 
        e.preventDefault();
        this.parentNode.querySelector('input[type=number]').stepUp();
    });
}

// Woo cart Js End
