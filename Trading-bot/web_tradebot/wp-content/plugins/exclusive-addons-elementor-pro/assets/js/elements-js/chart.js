// chart script starts

var exclusiveChart = function( $scope, $ ) {	

	var exadChartWrapper = $scope.find( '.exad-chart-wrapper' ).eq(0),
	exadChartType        = exadChartWrapper.data( 'type' ),
	exadChartLabels      = exadChartWrapper.data( 'labels' ),
	exadChartsettings    = exadChartWrapper.data('settings'),
	
	exadChart            = $scope.find( '.exad-chart-widget' ).eq( 0 ),
	exadChartId          = exadChart.attr( 'id' ),
	ctx                  = document.getElementById( exadChartId ).getContext( '2d' ),
	myChart              = new Chart( ctx, exadChartsettings );	
}

// chart script ends

