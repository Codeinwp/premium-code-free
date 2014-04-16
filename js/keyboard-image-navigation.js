jQuery( document ).ready( function( $ ) {
	$( document ).keydown( function( e ) {
		var url = false;
		if ( e.which === 37 ) {   
			url = $( '.previous-image a' ).attr( 'href' );
		}
		else if ( e.which === 39 ) {  
			url = $( '.entry-attachment a' ).attr( 'href' );
		}
		if ( url && ( !$( 'textarea, input' ).is( ':focus' ) ) ) {
			window.location = url;
		}
	} );
} );
