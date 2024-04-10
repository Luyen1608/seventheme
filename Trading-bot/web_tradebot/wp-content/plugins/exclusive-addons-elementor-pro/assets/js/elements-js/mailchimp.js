window.exadMailchimpSubscribe = function( formId, apiKey, listId, buttonText, successMsg, errorMsg, loadingText ) {
	$( '#'+formId ).on('submit', function(e) {
		e.preventDefault();
		var self = $(this);

		self.find( '.exad-mailchimp-subscribe-btn span.exad-mailchimp-subscribe-btn-text' ).html( loadingText );
		$.ajax({
			url: exad_frontend_ajax_object.ajaxurl,
			type: 'POST',
			data: {
				action: 'exad_mailchimp_subscriber',
				fields: self.serialize(),
				apiKey: apiKey,
				listId: listId
			},
			success: function( param ) {
				if( 'error' !== param ) {
					self.find( '.exad-mailchimp-form-container' ).after( '<div class="exad-mailchimp-success-message"><p>'+successMsg+'</p></div>' );
					self.find( 'input[type=text], input[type=email], textarea' ).val('');
					self.find( '.exad-mailchimp-subscribe-btn span.exad-mailchimp-subscribe-btn-text' ).html( buttonText );
				} else {
					self.find( '.exad-mailchimp-form-container' ).after( '<div class="exad-mailchimp-error-message"><p>'+errorMsg+'</p></div>' );
					self.find( '.exad-mailchimp-subscribe-btn span.exad-mailchimp-subscribe-btn-text' ).html( buttonText );
				}
			}
		} );
	})
}


var exadMailChimp = function($scope, $) {
	var mailChimp = $scope.find( '.exad-mailchimp-container' ).eq(0),
	mailchimpID   = undefined !== mailChimp.data( 'mailchimp-id' ) ? mailChimp.data( 'mailchimp-id' ) : '',
	apiKey        = undefined !== mailChimp.data( 'api-key' ) ? mailChimp.data( 'api-key' ) : '',
	listID        = undefined !== mailChimp.data( 'list-id' ) ? mailChimp.data( 'list-id' ) : '',
	buttonText    = undefined !== mailChimp.data( 'button-text' ) ? mailChimp.data( 'button-text' ) : '',
	successText   = undefined !== mailChimp.data( 'success-text' ) ? mailChimp.data( 'success-text' ) : '',
	errorText     = undefined !== mailChimp.data( 'error-text' ) ? mailChimp.data( 'error-text' ) : '',
	loadingText   = undefined !== mailChimp.data( 'loading-text' ) ? mailChimp.data( 'loading-text' ) : '';

	exadMailchimpSubscribe(
		'exad-mailchimp-form-' + mailchimpID + '',
		apiKey,
		listID,
		buttonText,
		successText,
		errorText,
		loadingText
	);
}