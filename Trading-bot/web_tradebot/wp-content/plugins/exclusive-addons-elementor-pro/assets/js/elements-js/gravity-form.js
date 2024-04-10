// Gravity Form script starts

var ExadGravityForm = function( $scope, $ ) {
    var gravityFrom   = $scope.find( '.exad-gravity-form' ).eq( 0 );
    
    gravityFrom.each(function(){
        var field = $(this).find('select');
        field.parent().addClass('exad-gform-select');
    });
}

// Gravity Form script ends