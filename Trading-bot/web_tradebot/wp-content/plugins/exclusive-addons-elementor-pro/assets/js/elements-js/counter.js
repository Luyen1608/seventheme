// counter up script starts

var exclusiveCounterUp = function( $scope, $ ) {
	var counterUp   = $scope.find( '.exad-counter' ).eq( 0 ),
	exadCounterTime = counterUp.data( 'counter-speed' );

    counterUp.counterUp({
        delay: 10,
        time: exadCounterTime
    } );		
}

// counter up script ends
