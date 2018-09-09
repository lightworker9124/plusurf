( function( window ) {
	
	'use strict';

	function UpMenu( options ) {	
		this.menu    = document.getElementById( 'menu-toggle' );
		this.body    = document.getElementById( 'body' );
		this.wrapper = document.getElementById( 'site-wrapper' );
		this._init();
	}

	UpMenu.prototype = {
		_init : function() {
			this.toggle = this.menu;
			this.isMenuOpen = false;
			this.eventtype = mobilecheck() ? 'touchstart' : 'click';
			this._initEvents();
			classie.add( this.body, 'upmenu-close' );
			var self = this;
		},
		_initEvents : function() {
			var self = this;
			this.toggle.addEventListener( this.eventtype, function( currentevent ) {
				currentevent.stopPropagation();
				currentevent.preventDefault();
				if( self.isMenuOpen ) {
					self._closeMenu();
					$(".nano").nanoScroller();
				}
				else {
					self._openMenu();
					$(".nano").nanoScroller();
					window.setTimeout(function(){
						self._closeMenu();
					}, 25000);
				}
			} );
			this.wrapper.addEventListener( "click", function( newevent ) {
				self._closeMenu();
			} );
		},
		_openMenu : function() {
			if( this.isMenuOpen ) return;
			this.isMenuOpen = true;
			classie.add( this.body, 'upmenu-open' );
			classie.remove( this.body, 'upmenu-close' );
		},
		_closeMenu : function() {
			if( !this.isMenuOpen ) return;
			this.isMenuOpen = false;
			classie.remove( this.body, 'upmenu-open' );
			classie.add( this.body, 'upmenu-close' );
		}
	}

	window.UpMenu = UpMenu;

} )( window );