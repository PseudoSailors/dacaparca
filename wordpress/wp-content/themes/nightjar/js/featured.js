( function( $ ) {
	$( window ).load( function() {
		if ( nightjarHasFeaturedPosts.posts ) {
			$( '.rslides' ).responsiveSlides( {
				auto: true,
				nav: true,
				timeout: 4500,
				prevText: '<span class="screen-reader-text">' + nightjarHasFeaturedPosts.prev + '</span>',
				nextText: '<span class="screen-reader-text">' + nightjarHasFeaturedPosts.next + '</span>',
				navContainer: '.featured-nav',
			} );
		} 
	} );
	
	/* fade out featured slider */
	function debounce( func, wait, immediate ) {
		var timeout;
		return function() {
			var context = this, args = arguments;
			var later = function() {
				timeout = null;
				if ( !immediate ) func.apply( context, args );
			};
			var callNow = immediate && ! timeout;
			clearTimeout( timeout );
			timeout = setTimeout( later, wait );
			if ( callNow ) func.apply( context, args );
		};
	};
	
	var fadeSlider = debounce( function() {
		var featured = $( '.backstretch .content' );
		var featuredContent = $( '.featured .entry-content' ).offset().top - $( window ).scrollTop();
		var featuredHeight = $( '.featured .entry-content' ).height();
		var featuredBottom = featuredContent + featuredHeight;
		var contentHeight = $( '#content' ).offset().top - $( window ).scrollTop();

		if ( contentHeight < featuredBottom ) {
			featured.addClass( 'faded' );
		} else {
			featured.removeClass( 'faded' );
		}
	}, 150 );

	window.addEventListener( 'scroll', fadeSlider );
} )( jQuery );

