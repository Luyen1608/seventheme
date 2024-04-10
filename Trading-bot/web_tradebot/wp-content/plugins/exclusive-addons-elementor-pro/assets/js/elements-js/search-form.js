// Search Form script starts

var exclusiveSearchForm = function( $scope, $ ) {

    $scope.find( ".exad-search-form-input" ).focus( function(){
        $scope.find( ".exad-search-button-wrapper" ).addClass( "exad-input-focus" );
    } );

    $scope.find( ".exad-search-form-input" ).blur( function() {
        $scope.find( ".exad-search-button-wrapper" ).removeClass( "exad-input-focus" );
    } );        
}
// Search Form script ends
