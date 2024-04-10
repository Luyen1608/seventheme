// image hotspot script starts

var exclusiveImageHotspot = function ( $scope, $ ) {
	var hotspotWrapper = $scope.find( '.exad-hotspot' ).eq(0),
    hotspotItem        = hotspotWrapper.find( '.exad-hotspot-dot' );
    var hotspotTotalItem        = hotspotWrapper.find( '.exad-hotspot-item' );
    var style        = hotspotWrapper.data( 'style' );
    var tooltipOn        = hotspotWrapper.data( 'tooltip_on' );

    // hostpot script
    hotspotItem.each( function() {
        var leftPos = $(this).data( 'left' );
        var topPos = $(this).data( 'top' );
        $(this).css({ 'left' : leftPos, 'top' : topPos });
    } );

    if( 'tooltip-on-click' === tooltipOn ){
        if( style === 'default' ){
            hotspotItem.click(function() {
                var $parent = $(this).parent();
                $parent.toggleClass('exad-hotspot-open-default-tooltip');
                $('.exad-hotspot-item.exad-hotspot-open-default-tooltip').not($parent).removeClass('exad-hotspot-open-default-tooltip');
            });
        }
        if( style === 'style-1' ){
            hotspotItem.click(function() {
                var $parent = $(this).parent();
                $parent.toggleClass('exad-hotspot-open-tooltip');
                $('.exad-hotspot-item.exad-hotspot-open-tooltip').not($parent).removeClass('exad-hotspot-open-tooltip');
            });
        }
        if( style === 'style-2' ){
            hotspotItem.click(function() {
                var $parent = $(this).parent();
                $parent.toggleClass('exad-hotspot-open-style-2-tooltip');
                $('.exad-hotspot-item.exad-hotspot-open-style-2-tooltip').not($parent).removeClass('exad-hotspot-open-style-2-tooltip');
            });
        }
    }
}

// image hotspot script ends
