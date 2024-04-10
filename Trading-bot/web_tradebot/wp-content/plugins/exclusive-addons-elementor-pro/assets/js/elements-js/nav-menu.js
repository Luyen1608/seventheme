// Nav Menu script starts
var exclusiveNavMenu = function( $scope, $ ) {
  
	var navMenuWrapper = $scope.find( '.exad-nav-menu-wrapper' ).eq(0);
	var navMenu = $scope.find( '.exad-nav-menu' ).eq(0);
	if ( $.isFunction( $.fn.slicknav ) ) {    
		navMenu.slicknav({
			prependTo: navMenuWrapper,
			parentTag: 'liner',
			allowParentLinks: true,
			duplicate: true,
			label: '',
			closedSymbol: '<span class="eicon-chevron-right"></span>',
			openedSymbol: '<span class="dashicons dashicons-arrow-down-alt2"></span>',
			'afterOpen': function(){
				var navClass = $scope.find('.exad-nav-menu-wrapper > .slicknav_menu > .slicknav_nav');
				var buttonClass = $scope.find('.exad-nav-menu-wrapper > .slicknav_menu > .slicknav_btn ');
				var buttonRight = ($(window).width() - (buttonClass.offset().left + buttonClass.outerWidth()));
				var id = $scope.data('id');
				var navSection = $( '.elementor-element-' + id).closest('.elementor-section');
				var navSectionWidth = navSection.outerWidth();
				navClass.css('width', navSectionWidth + 'px' );
				navClass.css('right', '-' + buttonRight + 'px' );
			}
		} );
	}

}
// Nav Menu script ends