// instagram carousel script starts

var exclusiveInstagramCarousel   = function( $scope, $ ) {

    var $instagramGalleryId = $scope.find('.exad-instagram-feed-item').eq(0),
        $id = $instagramGalleryId.attr('id');
        
    $('#'+$id).each(function(){
        var target = $(this).data('target');
        var token = $(this).data('access_token');
        var limit = $(this).data('limit');
        var template = $(this).data('template');
        var userFeed = new Instafeed({
            target: target,
            limit: limit,
            accessToken: token,
            template: template
        });
        userFeed.run();
    });
    
}

// instagram carousel script ends
