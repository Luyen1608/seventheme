
// Gradiant Animation JS Start 

var BackgroundColorChange = function($scope, $) {

    var isBackgroundColorChange = $scope.hasClass( 'exad-background-color-change-yes' );
    
    if( isBackgroundColorChange ) {

        var idSection = $scope.data('id');
        var content = $( '<canvas class="exad-background-animation-canvas" id="canvas-image-' + idSection + '"></canvas>' )
        var canvasClass = $scope.prepend( content );
        var id = canvasClass.find(".exad-background-animation-canvas").attr("id");

        var bgAnimClasses = $scope.attr("class");
        var bgAnimClassesArray = bgAnimClasses.split( ' ' );

        var bgAnimClassesValue = bgAnimClassesArray.filter(function (elem) {
            return elem.startsWith('exad-color-') == true;
        });
        
        bgAnimClassesValue.sort();

        var granimInstance = new Granim({
            element: '#' +id,
            direction: 'left-right',
            isPausedWhenNotInView: true,
            states : {
                "default-state": {
                    gradients: [
                        [ bgAnimClassesValue[0].substr(12), bgAnimClassesValue[1].substr(12) ],
                        [ bgAnimClassesValue[2].substr(12), bgAnimClassesValue[3].substr(12) ],
                        [ bgAnimClassesValue[4].substr(12), bgAnimClassesValue[5].substr(12) ],
                    ]
                }
            }
        });
    }
};

jQuery(window).on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction( 'frontend/element_ready/section', BackgroundColorChange );
});

// Gradiant Animation JS Ends 
