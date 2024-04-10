// Thumb Preview script starts

var exclusiveDemoPreviewer = function( $scope, $ ) {
    $( window ).load( function() {

        function debounce( fn, threshold ) {
            var timeout;
            threshold = threshold || 100;
            return function debounced() {
            clearTimeout( timeout );
            var args = arguments;
            var _this = this;
            function delayed() {
                fn.apply( _this, args );
            }
            timeout = setTimeout( delayed, threshold );
            };
        }

        // flatten object by concatting values
        function concatValues( obj ) {
            var value = '';
            for ( var prop in obj ) {
            value += obj[ prop ];
            }
            return value;
        }

        if ( $.isFunction( $.fn.isotope ) ) {
            var exadThumbPreview       = $scope.find( '.exad-demo-previewer-element' ).eq( 0 ),
            currentPreviewId         = '#' + exadThumbPreview.attr( 'id' ),
            $container             = $scope.find( currentPreviewId ).eq( 0 );
            
            var previewMainWrapper = $scope.find( '.exad-demo-previewer-items' ).eq( 0 ),
            previewItem            = '#' + previewMainWrapper.attr( 'id' );

            var qsRegex;
            var buttonFilter;
            var buttonFilters = {};

            // init Isotope
            var $grid = $container.isotope({
                itemSelector: '.exad-demo-previewer-element .exad-demo-previewer-item',
                layoutMode: 'fitRows',
                filter: function() {
                    var $this = $(this);
                    var searchResult = qsRegex ? $(this).text().match( qsRegex ) : true;
                    var buttonResult = buttonFilter ? $(this).is( buttonFilter ) : true;
                    return searchResult && buttonResult;
                }
            });

            $( previewItem + ' .exad-demo-previewer-menu button' ).click( function() {

                var $this = $(this);
                var $buttonGroup = $this.parents('.exad-demo-previewer-menu');
                var filterGroup = $buttonGroup.attr('data-filter-group');
                buttonFilters[ filterGroup ] = $this.attr('data-filter');
                buttonFilter = concatValues( buttonFilters );
                $grid.isotope();
            });

            var menuItem = $scope.find( $( previewItem + ' .exad-demo-previewer-menu' ) );
            menuItem.each( function( i, buttonGroup ) {
                var $buttonGroup = $( buttonGroup );
                $buttonGroup.on( 'click', 'button', function() {
                $buttonGroup.find('.current').removeClass('current');
                $( this ).addClass('current');
                });
            });

            var searchPreview = $scope.find('#exad-demo-previewer-search-input');
            var $quicksearch = searchPreview.keyup( debounce( function() {
                qsRegex = new RegExp( $quicksearch.val(), 'gi' );
                $grid.isotope();
            }) );

            var filterWrapper = $scope.find(".exad-demo-previewer-dropdown-filter-wrapper");
            var defalutFilter = $scope.find(".exad-demo-previewer-dropdown-filter-default");
            var selectFilterList = $scope.find(".exad-demo-previewer-dropdown-filter-select li");
            var defaultFilterList = $scope.find(".exad-demo-previewer-dropdown-filter-default li");

            defalutFilter.on( 'click', function(){
                filterWrapper.toggleClass("active");
            });
            
            selectFilterList.click(function(){
                var currentele = $(this).html();
                defaultFilterList.html(currentele);
                filterWrapper.removeClass("active");
            });
        }
    } ); 
}