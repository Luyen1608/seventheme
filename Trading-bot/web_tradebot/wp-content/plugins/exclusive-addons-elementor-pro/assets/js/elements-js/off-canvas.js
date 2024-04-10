// OffCanvas PRO script starts

var exclusiveOffCanvas = function( $scope, $ ) {

    function offCanvasActive(offCanvas){
        var appearAnimation = offCanvas.find('.exad-offcanvas-content-inner').data('appear_animation');
        var position = offCanvas.find('.exad-offcanvas-content-inner').data('position');
        var width = offCanvas.find('.exad-offcanvas-content-inner').width();
        var height = offCanvas.find('.exad-offcanvas-content-inner').height();

        offCanvas.find(".exad-offcanvas-content-inner").addClass("offcanvas-active");
        offCanvas.find(".exad-offcanvas-overlay").addClass("offcanvas-active");
        if ( 'push' == appearAnimation ){
            if( 'offcanvas-left' == position ){
                $("body").addClass("offcanvas-active").css({
                    'margin-left' : width + 'px',
                });
            }
            if( 'offcanvas-right' == position ){
                $("body").addClass("offcanvas-active").css({
                    'margin-right' : width + 'px',
                });
            }
            if( 'offcanvas-top' == position ){
                $("body").addClass("offcanvas-active").css({
                    'margin-top' : height + 'px',
                });
            }
            if( 'offcanvas-top' == position ){
                $("body").addClass("offcanvas-active").css({
                    'margin-bottom' : height + 'px',
                });
            }
        }
    }

    function offCanvasRemove(offCanvas){

        var appearAnimation = offCanvas.find('.exad-offcanvas-content-inner').data('appear_animation');
        var position = offCanvas.find('.exad-offcanvas-content-inner').data('position');
        var width = offCanvas.find('.exad-offcanvas-content-inner').width();
        var height = offCanvas.find('.exad-offcanvas-content-inner').height();

        offCanvas.find(".exad-offcanvas-content-inner").removeClass("offcanvas-active");
        offCanvas.find(".exad-offcanvas-overlay").removeClass("offcanvas-active");
        if ( 'push' == appearAnimation ){
            if( 'offcanvas-left' == position ){
                $("body").removeClass("offcanvas-active").css({
                    'margin-left' : 0 + 'px',
                });
            }
            if( 'offcanvas-right' == position ){
                $("body").removeClass("offcanvas-active").css({
                    'margin-right' : 0 + 'px',
                });
            }
            if( 'offcanvas-top' == position ){
                $("body").removeClass("offcanvas-active").css({
                    'margin-top' : 0 + 'px',
                });
            }
            if( 'offcanvas-top' == position ){
                $("body").removeClass("offcanvas-active").css({
                    'margin-bottom' : 0 + 'px',
                });
            }
        }
    }

    var exadOffCanvasWrapper = $scope.find( '[data-offcanvas]' ).eq(0);

    exadOffCanvasWrapper.each( function( index ){

        var offCanvas = $(this);

        offCanvas.find( '.exad-offcanvas-open-button' ).click(function(e){
            e.preventDefault();
            offCanvasActive(offCanvas);
        });
    
        offCanvas.find( '.exad-offcanvas-close-button' ).on("click", function(e){
            e.preventDefault();
            offCanvasRemove(offCanvas);
        });

        var overlayClick = offCanvas.data('overlay_click');
        if ( 'yes' === overlayClick ){
            offCanvas.find( '.exad-offcanvas-overlay' ).on("click", function(){
                offCanvasRemove(offCanvas);
            });
        }

        $( document).on( 'keyup', function(e) {
            if ( e.keyCode == 27 ){
                var escKeypress = offCanvas.data('esc_keypress');

                if( 'yes' === escKeypress ) {
                    offCanvasRemove(offCanvas);
                }		
            }
        });

        $( document ).ready( function( e ) {

            var customClass = offCanvas.data( 'custom_class' );

            // Custom Class click event
            if( 'undefined' != typeof customClass && '' != customClass ) {
                var custom_class_selectors = customClass.split( ',' );
                if( custom_class_selectors.length > 0 ) {
                    for( var i = 0; i < custom_class_selectors.length; i++ ) {
                        if( 'undefined' != typeof custom_class_selectors[i] && '' != custom_class_selectors[i] ) {
                            $( '.' + custom_class_selectors[i] ).css( "cursor", "pointer" );
                            $( document ).on( 'click', '.' + custom_class_selectors[i], function(e) {
                                e.preventDefault();
                                offCanvasActive(offCanvas);
                            } );
                        }
                    }
                }
            }

		} );
    });
}

// OffCanvas PRO script ends
