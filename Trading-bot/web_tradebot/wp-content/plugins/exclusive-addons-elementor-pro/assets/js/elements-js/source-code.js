
var exclusiveSourceCode = function ( $scope ) {
    var sourceCodeItem  = $scope.find( '.exad-source-code' ),
    copyBtn             = $scope.find( '.exad-copy-button' ),
    languageType        = sourceCodeItem.data( 'lng-type' ),
    sourceCode          = sourceCodeItem.find( 'code.language-' + languageType ),
    afterCopiedBtnText  = sourceCodeItem.data( 'after-copied-btn-text' );

    copyBtn.on( 'click', function () {
        var $temp = $( '<textarea>' );
        $(this).append( $temp );
        $temp.val( sourceCode.text() ).select();
        document.execCommand( 'copy' );
        $temp.remove();

        if( afterCopiedBtnText.length ) {
            $(this).text( afterCopiedBtnText );
        }
    } );

    if ( languageType !== undefined && sourceCode !== undefined ) {
        Prism.highlightElement( sourceCode.get(0) );
    }
}