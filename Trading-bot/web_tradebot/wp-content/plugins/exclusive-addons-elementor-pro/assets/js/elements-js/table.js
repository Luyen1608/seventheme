// table script starts

var exclusiveTable = function( $scope, $ ) {
	var exadGetTableContainer = $scope.find( '.exad-table-container' ).eq(0),
	searchText                = ( exadGetTableContainer.data( 'search-text' ) !== undefined ) ? exadGetTableContainer.data( 'search-text' ) : '',
	searchPlaceholder         = ( exadGetTableContainer.data( 'search-placeholder' ) !== undefined ) ? exadGetTableContainer.data( 'search-placeholder' ) : '',
	notFoundText              = ( exadGetTableContainer.data( 'not-found-text' ) !== undefined ) ? exadGetTableContainer.data( 'not-found-text' ) : '',
	previousText              = ( exadGetTableContainer.data( 'previous-text' ) !== undefined ) ? exadGetTableContainer.data( 'previous-text' ) : '',
	nextText                  = ( exadGetTableContainer.data( 'next-text' ) !== undefined ) ? exadGetTableContainer.data( 'next-text' ) : '',
	verticalHeight            = ( exadGetTableContainer.data( 'vertical-height' ) !== undefined ) ? exadGetTableContainer.data( 'vertical-height' ) : '',
	sorting                   = ( exadGetTableContainer.data( 'sorting' ) !== undefined ) ? exadGetTableContainer.data( 'sorting' ) : false,
	infoText                  = ( exadGetTableContainer.data( 'enable-info' ) !== undefined ) ? 'Showing _START_ to _END_ of _TOTAL_ entries' : '',
	searching                 = ( exadGetTableContainer.data( 'searching' ) !== undefined ) ? exadGetTableContainer.data( 'searching' ) : false,
	pagination                = ( exadGetTableContainer.data( 'pagination' ) !== undefined ) ? exadGetTableContainer.data( 'pagination' ) : false,
	exadGetTable              = $scope.find( '.exad-main-table' ).eq(0),
	currentTableId            = '#' + exadGetTable.attr('id'),
	exadTableID               = $scope.find( currentTableId ).eq(0);
	if( sorting ){
	    exadTableID.DataTable({
		    paging: pagination,
		    aLengthMenu: [ [5, 10, 25, 40, -1], [5, 10, 25, 40, 'All'] ],
		    searching: searching,
			scrollY: verticalHeight,
		 	language: {
				search: searchText,
				zeroRecords: notFoundText,
				searchPlaceholder: searchPlaceholder,
				lengthMenu: 'show _MENU_ entries',
				info: infoText,
				infoEmpty: 'No records available',
				emptyTable: 'No data available',
				infoFiltered: '(filtered from _MAX_ total records)'
		  	},
			oLanguage: {
	      		oPaginate: {
	        		sPrevious: previousText,
	        		sNext: nextText
	      		}
	    	}
		    // scrollY: 400
		} );	
	}
	
	var table_responsive = exadGetTableContainer.data( 'exad_custom_responsive' );

	if ( table_responsive == true ) {
		var $th = exadGetTableContainer.find(".exad-main-table").find("th");
        var $tbody = exadGetTableContainer.find(".exad-main-table").find("tbody");

		$tbody.find("tr").each(function (i,  item)  {
			$(item).find("td .exad-td-content-wrapper").each(function (index,  item){
				if ($th.eq(index).length == 0){
					$(this).prepend('<div class="exad-th-mobile-screen">' + "</div>");
				} else {
					$(this).prepend('<div class="exad-th-mobile-screen">' + $th.eq(index).html() + "</div>");
				}
			});
		});
	}
}

// table script ends
