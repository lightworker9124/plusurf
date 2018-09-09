( function( window ) {
	
	'use strict';

	function AdminMenu( options ) {	
		this.adminwrap    = document.getElementById( 'admin-wrap' );
		this.adminheader  = document.getElementById( 'admin-header' );
		this.adminsidebar = document.getElementById( 'admin-sidebar' );
		this.adminmenu    = document.getElementById( 'admin-menu' );
		this.body         = document.getElementById( 'body' );
		this._init();
	}

	AdminMenu.prototype = {
		_init : function() {
			this.toggle = this.adminheader.querySelector( 'a.toggle' );
			this.resize = this.adminmenu.querySelector( 'li.resize' );
			
			this.isMenuOpen = false;
			this.resized = false;
			this.eventtype = mobilecheck() ? 'touchstart' : 'click';
			this._initEvents();

			var self = this;
		},
		_initEvents : function() {
			var self = this;
			var check_resize = getCookie("menu_resize");
			this.toggle.addEventListener( this.eventtype, function( currentevent ) {
				currentevent.stopPropagation();
				currentevent.preventDefault();
				if( self.isMenuOpen ) {
					self._closeMenu();
				}
				else {
					self._openMenu();
				}
			} );
			if( check_resize == "true" ) {
				self._openResize();
			}
			this.resize.addEventListener( this.eventtype, function(currentevent) {
				currentevent.stopPropagation(); 
				if( self.resized ) {
					self._closeResize();
				}
				else {
					self._openResize();
				}
			} );
		},
		_openResize : function() {
			if( this.resized ) return;
			classie.toggle( this.adminwrap, 'small' );
			setCookie("menu_resize", "true", 4);
			this.resized = true;
			$(".nano").nanoScroller();
		},
		_closeResize : function() {
			if( !this.resized ) return;
			classie.toggle( this.adminwrap, 'small' );
			setCookie("menu_resize", "", 0);
			this.resized = false;
			$(".nano").nanoScroller();
		},
		_openMenu : function() {
			if( this.isMenuOpen ) return;
			this.isMenuOpen = true;
			if(!mobilecheck() || !window.innerWidth < 800)
			{
				classie.add( this.adminwrap, 'fullwidth' );
			}
			if(mobilecheck() || window.innerWidth < 800)
			{
				classie.remove( this.adminsidebar, 'force-close' );
				classie.add( this.adminsidebar, 'force-open' );
			}
		},
		_closeMenu : function() {
			if( !this.isMenuOpen ) return;
			classie.remove( this.adminsidebar, 'force-close' );
			this.isMenuOpen = false;
			if(!mobilecheck() || !window.innerWidth < 800)
			{
				classie.remove( this.adminwrap, 'fullwidth' );
			}
			if(mobilecheck() || window.innerWidth < 800)
			{
				classie.remove( this.adminsidebar, 'force-open' );
				classie.add( this.adminsidebar, 'force-close' );
			}
		}
	}

	window.AdminMenu = AdminMenu;

} )( window );