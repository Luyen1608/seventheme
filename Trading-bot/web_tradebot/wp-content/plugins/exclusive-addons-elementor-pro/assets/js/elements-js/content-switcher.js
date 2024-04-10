var exclusiveContentSwitcher = function ( $scope, $ ) {

    var main_switch = $scope.find( '.exad-content-switcher-toggle-switch' );
    var main_switch_span = main_switch.find( '.exad-content-switcher-toggle-switch-slider' );

    var content_1 = $scope.find('.exad-content-switcher-primary-wrap');
    var content_2 = $scope.find('.exad-content-switcher-secondary-wrap');

    if( main_switch_span.is( ':checked' ) ) {
        content_1.hide();
        content_2.show();
    } else {
        content_1.show();
        content_2.hide();
    }

    main_switch_span.on('click', function(e){
        content_1.toggle();
        content_2.toggle();
    });
};