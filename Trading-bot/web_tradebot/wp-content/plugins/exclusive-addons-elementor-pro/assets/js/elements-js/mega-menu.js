// Mega menu js start

var MegaMenu = function( $scope, $ ) {	

    var exadMegaMenu = $scope.find( '.exad-mega-menu' ).eq(0);
    var id = $scope.data('id');
    var menuwrapper = $scope.find( '.exad-mega-menu-wrapper' );
    var menuList = $scope.find( '.exad-mega-menu-wrapper ul.exad-mega-menu-list' );
    var oriantation = exadMegaMenu.data( 'mega-menu-oriantation' );

    exadMegaMenu.find( '.exad-sub-menu' ).each( function() {
        
        var parent = $( this ).closest( '.menu-item' );

        $scope.find( parent ).addClass( 'parent-has-child' );
        $scope.find( parent ).removeClass( 'parent-has-no-child' );
    });

    if( 'horizontal' == oriantation ){
        
        $( '.elementor-element-' + id + ' .exad-mega-menu-list > li.menu-item' ).each( function() {
            var $this = $( this );
            var dropdown_width = $this.data('dropdown_width');
    
            if ( 'section' == dropdown_width ){
    
                var closeset_section = $( '.elementor-element-' + id).closest('.elementor-section');
                var sec_width = closeset_section.outerWidth();
    
                var sec_pos = closeset_section.offset().left - $this.offset().left;	
                $this.find('ul.exad-sub-menu').css('left', sec_pos + 'px' );
    
                $this.find('ul.exad-sub-menu').css('width', sec_width + 'px' );
            } else if ( 'container' == dropdown_width ){
    
                var closeset_container = $( '.elementor-element-' + id).closest('.elementor-container');
                var cont_width = closeset_container.outerWidth();
    
                var cont_pos = closeset_container.offset().left - $this.offset().left;
                $this.find('ul.exad-sub-menu').css('left', cont_pos + 'px' );
    
                $this.find('ul.exad-sub-menu').css('width', cont_width + 'px' );
            } else if( 'column' == dropdown_width ){
                var closeset_column = $( '.elementor-element-' + id).closest('.elementor-column');
                var col_width = closeset_column.outerWidth();
    
                var col_pos = closeset_column.offset().left - $this.offset().left;
                $this.find('ul.exad-sub-menu').css('left', col_pos + 'px' );
    
                $this.find('ul.exad-sub-menu').css('width', col_width + 'px' );
            }
        });
    } else{
        $( '.elementor-element-' + id + ' .exad-mega-menu-list > li.menu-item' ).each( function() {
            var $this = $( this );
            var ver_dropdown_width = $this.data('vertical_dropdown_width');
            
            if( 'vertical-container' == ver_dropdown_width ){

                var closeset_container = $( '.elementor-element-' + id).closest('.elementor-container');
                var container_width = closeset_container.outerWidth();
                var ver_width = $scope.find('.exad-mega-menu.exad-mega-menu-oriantation-vertical').outerWidth();
                var tolal_width = container_width - ver_width;
                $this.find('ul.exad-sub-menu').css('width', tolal_width + 'px' );

            }
        });
    }

    if ( $.isFunction( $.fn.slicknav ) ) {  
        menuList.slicknav({
            appendTo : menuwrapper,
            label: '',
            'afterOpen': function(){
                var navClass = $scope.find('.exad-mega-menu-wrapper .slicknav_menu .slicknav_nav');
                var id = $scope.data('id');
                var navSection = $( '.elementor-element-' + id).closest('.elementor-section');
                var navSectionWidth = navSection.outerWidth();
                navClass.css('width', navSectionWidth + 'px' );
            }
        });
    }
}

// Mega menu js end