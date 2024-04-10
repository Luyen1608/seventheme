// Blob maker script starts

var exclusiveBlob = function( $scope, $ ) {	

    var exadBlobWrapper = $scope.find( '.exad-blob-maker' ).eq(0);
    var exadBlobShape = $scope.find( '.exad-blob-maker .exad-blob-shape' );

    exadBlobShape.each(function(i) {
        var id = $(this).attr('id');
        var translateXfrom = $(this).data('translate_x_from');
        var translateXto = $(this).data('translate_x_to');
        var translateYfrom = $(this).data('translate_y_from');
        var translateYto = $(this).data('translate_y_to');
        var rotateX = $(this).data('rotate_x');
        var rotateY = $(this).data('rotate_y');
        var rotateZ = $(this).data('rotate_z');
        var scaleX = $(this).data('scale_x');
        var scaleY = $(this).data('scale_y');
        var scaleZ = $(this).data('scale_z');
        var translateXduration = $(this).data('translate_x_duration');
        var translateYduration = $(this).data('translate_y_duration');
        var rotateXduration = $(this).data('rotate_x_duration');
        var rotateYduration = $(this).data('rotate_y_duration');
        var rotateZduration = $(this).data('rotate_z_duration');
        var scaleXduration = $(this).data('scale_x_duration');
        var scaleYduration = $(this).data('scale_y_duration');
        var scaleZduration = $(this).data('scale_z_duration');
        anime({
            targets: '#'+id,
            translateX: {
                value: [ translateXfrom, translateXto ],
                duration: translateXduration
            },
            translateY: {
                value: [ translateYfrom, translateYto ],
                duration: translateYduration
            },
            rotateX: {
                value: rotateX,
                duration: rotateXduration
            },
            rotateY: {
                value: rotateY,
                duration: rotateYduration
            },
            rotateZ: {
                value: rotateZ,
                duration: rotateZduration
            },
            scaleX: {
                value: scaleX,
                duration: scaleXduration
            },
            scaleY: {
                value: scaleY,
                duration: scaleYduration
            },
            scaleZ: {
                value: scaleZ,
                duration: scaleZduration
            },
            direction: 'alternate',
            loop: true,
            easing: 'linear'
        });
    });
}

// Blob maker script starts

