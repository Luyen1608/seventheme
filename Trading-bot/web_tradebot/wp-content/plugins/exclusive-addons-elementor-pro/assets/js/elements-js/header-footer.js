
/**
 * Sticky Header JS
 * 
 */

function exadHeaderScroll() {
    var regularHeader = $('#exad-masthead');
    var $wpAdminBar = $( '#wpadminbar' );
    var $mobileAdminBar;

    if ($wpAdminBar.length) {
        var $wpAdminBarHeight = $wpAdminBar.height();
    } else {
        var $wpAdminBarHeight = 0;
    }

    if (window.matchMedia("(max-width: 600px)").matches) {
        $mobileAdminBar = 0;
    } else {
        $mobileAdminBar = $wpAdminBarHeight;
    }

    if ( regularHeader.length )  {

        if ( regularHeader.hasClass("exad-sticky-header") ) {
            regularHeader.css({
                "position": "-webkit-sticky",
                "position": "sticky",
                "top": 0 + $mobileAdminBar,
            });
        }
    }

}

$(window).on('scroll resize load', function () {
    exadHeaderScroll();
});

