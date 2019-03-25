$ = jQuery.noConflict();
$(function ($) {	
	[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
		new CBPFWTabs( el );
	});
});