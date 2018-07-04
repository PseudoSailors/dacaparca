/**
 * Contains various JS functions for the theme
 *
 */
( function( $ ) {
	var body = $( 'body' );
	var panelToggle = $( '.panel-toggle' );
	var panel = $( '.panel' );
	var toggleText = panelToggle.find( '.screen-reader-text' );
	var menu = $( '.site-navigation ul' );
	var links = menu.find( 'a' );
	var subMenus = menu.find( 'ul' );
	
	/* borrowed from Twenty Sixteen */
	function initMainNavigation( container ) {
		// Add dropdown toggle that displays child menu items.
		var dropdownToggle = $( '<button />', {
			'class': 'dropdown-toggle',
			'aria-expanded': false
		} ).append( $( '<span />', {
			'class': 'screen-reader-text',
			text: nightjarScreenReaderText.expand
		} ) );

		container.find( '.menu-item-has-children > a' ).after( dropdownToggle );

		// Toggle buttons and submenu items with active children menu items.
		container.find( '.current-menu-ancestor > button' ).addClass( 'toggled-on' );
		container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

		// Add menu items with submenus to aria-haspopup="true".
		container.find( '.menu-item-has-children' ).attr( 'aria-haspopup', 'true' );

		container.find( '.dropdown-toggle' ).click( function( e ) {
			var _this            = $( this ),
				screenReaderSpan = _this.find( '.screen-reader-text' );

			e.preventDefault();
			_this.toggleClass( 'toggled-on' );
			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );

			// jscs:disable
			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			// jscs:enable
			screenReaderSpan.text( screenReaderSpan.text() === nightjarScreenReaderText.expand ? nightjarScreenReaderText.collapse : nightjarScreenReaderText.expand );
		} );
	}
	initMainNavigation( $( '.main-navigation' ) );
	
	panelToggle.on( 'click', function( e ) {
		var $this = $( this );
		e.preventDefault();
		
		panel.toggleClass( 'expanded' ).resize();
		body.toggleClass( 'sidebar-open' );

		$this.toggleClass( 'toggle-on' );
		$this.attr( 'aria-expanded', $( this ).attr( 'aria-expanded' ) == 'false' ? 'true' : 'false');

		if ( panel.hasClass( 'expanded' ) ) {
			toggleText.text( 'Hide' );
		} else {
			toggleText.text( 'Show' );
		}
	} );
	
	function toggleFocus() {
		$( this ).parentsUntil( menu, 'li' ).toggleClass( 'focus' );
	}
	
	subMenus.each( function() {
		$( this ).parent().attr( 'aria-haspopup', 'true' );
	} );
	
	links.each( function() {
		$( this ).on( 'focus blur', toggleFocus );
	} );
} )( jQuery );