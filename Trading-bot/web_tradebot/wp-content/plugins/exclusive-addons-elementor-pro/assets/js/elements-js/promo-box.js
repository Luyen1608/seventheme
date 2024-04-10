var exadPromoBoxCountdownTimer = function ( $scope, $ ) {
    var countdownTimerWrapper = $scope.find( '[data-countdown]' ).eq(0);

    var parentClass = $scope.find('.exad-promo-box-wrapper');
    var position = parentClass.data('position');
    var parentHeight = parentClass.outerHeight();

    if( position === 'top' ){
        var margin = $("body.exclusive-addons-elementor").css("margin-top",  parentHeight + "px");
    }

    if ( 'undefined' !== typeof countdownTimerWrapper && null !== countdownTimerWrapper ) {
        var $this   = countdownTimerWrapper,
        finalDate   = $this.data( 'countdown' ),
        day         = $this.data( 'day' ),
        hours       = $this.data( 'hours' ),
        minutes     = $this.data( 'minutes' ),
        seconds     = $this.data( 'seconds' ),
        expiredText = $this.data( 'expired-text' );

        if ( $.isFunction( $.fn.countdown ) ) {
            $this.countdown( finalDate, function ( event ) {
                $( this ).html( event.strftime(' ' +
                    '<div class="exad-countdown-container"><div class="exad-countdown-timer-wrapper"><span class="exad-countdown-count">%-D </span><span class="exad-countdown-title">' + day + '</span></div></div>' +
                    '<div class="exad-countdown-container"><div class="exad-countdown-timer-wrapper"><span class="exad-countdown-count">%H </span><span class="exad-countdown-title">' + hours + '</span></div></div>' +
                    '<div class="exad-countdown-container"><div class="exad-countdown-timer-wrapper"><span class="exad-countdown-count">%M </span><span class="exad-countdown-title">' + minutes + '</span></div></div>' +
                    '<div class="exad-countdown-container"><div class="exad-countdown-timer-wrapper"><span class="exad-countdown-count">%S </span><span class="exad-countdown-title">' + seconds + '</span></div></div>'));
            } ).on( 'finish.countdown', function (event) {
                $(this).html( '<p class="message">'+ expiredText +'</p>' );
            } );
        }
    }
}

var exadPromoBoxAlert = function( $scope, $ ) {
    var getPromoBox = $scope.find( '.exad-promo-box-container' ).eq(0),
    currentPromoID            = '#' + getPromoBox.attr('id'),
    exadPromoID               = $scope.find( currentPromoID ).eq(0);

    var alertClose = $scope.find( exadPromoID ).eq(0);
    alertClose.each( function( index ){
        var alert = $(this);
        alert.find( '.exad-promo-box-dismiss-icon' ).click( function( e ){
            e.preventDefault();
            alert.fadeOut( 500 );
            $("body.exclusive-addons-elementor").css("margin-top",  "0px");
            $("body.exclusive-addons-elementor").css("transition",  "0.5s");
        } );
    } );

    $(window).load(function() {
        var viewportWidth = $(window).width();
        if ( viewportWidth < 768 ) {
            $( '.exad-promo-position-top' ).addClass( 'exad-responsive-promo-box' );
            $( '.exad-promo-position-bottom' ).addClass( 'exad-responsive-promo-box' );
        }
    } );
}