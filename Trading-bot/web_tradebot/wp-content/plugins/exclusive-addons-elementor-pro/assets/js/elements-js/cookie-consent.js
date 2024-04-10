
//cookie consent script starts

var widgetCookieConsent = function( $scope, $ ) {

    var $cookieConsent = $scope.find('.exad-cookie-consent'),
        $settings      = $cookieConsent.data('settings');
    
    if ( ! $cookieConsent.length || elementorFrontend.isEditMode() ) {
        return;
    }

    window.cookieconsent.initialise($settings);

};
//cookie consent script ends
