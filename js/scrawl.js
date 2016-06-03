( function( $ ) {

	var menuToggle = $( '.menu-toggle' );
	var slideMenu = $( '.slide-menu' );
	var body = $( 'body' );
	
	var toggleAria = function( selector ) {
		if ( 'false' === selector.attr( 'aria-expanded' ) ) {
			selector.attr( 'aria-expanded', 'true' );
		}
		else {
			selector.attr( 'aria-expanded', 'false' );
		}
	};
	
	slideMenu.attr( 'aria-expanded', 'false' );
	menuToggle.attr( 'aria-expanded', 'false' );
	
	/*
	 * Toggle slide menu
	 */
	function slideControl() {
		menuToggle.on( 'click', function( e ) {
			e.preventDefault();
			slideMenu.toggleClass( 'expanded' ).resize();
			body.toggleClass( 'sidebar-open' );
			$( this ).toggleClass( 'toggle-on' );
			toggleAria( slideMenu );
			toggleAria( $( this ) );

			// make sure the menu isn't 'fixed' - this makes sure we're on a mobile screen
			if (slideMenu.css( 'position') != 'fixed' ) {
				// check if we're opening or closing the menu
				// if we're opening the menu, set the current scroll position as data-pos, and go to top of page
				if( $( body ).hasClass( 'sidebar-open') ) {
					$( slideMenu ).attr( "data-pos", $(window).scrollTop() );
					$(window).scrollTop( 0 );
				}
				else { 
					// if not, return to saved data-pos
					$(window).scrollTop( $( slideMenu ).attr('data-pos') );
				}
			}
			
			//Close slide menu with double click
			body.dblclick( function( e ) {
				e.preventDefault();
				slideMenu.removeClass( 'expanded' ).resize();
				$( this ).removeClass( 'sidebar-open' );
				menuToggle.removeClass( 'toggle-on' );
				toggleAria( slideMenu );
				toggleAria( menuToggle );
				if (slideMenu.css( 'position') != 'fixed' ) {
					$(window).scrollTop( $( slideMenu ).attr('data-pos') );
				}
			} );
		} );

		$( '.site-header' ).on( 'hover', function( e ) {
			menuToggle.toggleClass( 'hover' );
		} );
	}

	/*
	 * Close slide menu with escape key
	 */
	$( document ).keyup( function( e ) {
		if ( e.keyCode === 27 && slideMenu.hasClass( 'expanded' ) ) {
			body.removeClass( 'sidebar-open' );
			menuToggle.removeClass( 'toggle-on' );
			slideMenu.removeClass( 'expanded' ).resize();
			toggleAria( slideMenu );
			toggleAria( menuToggle );

			if (slideMenu.css( 'position') != 'fixed' ) {
				$(window).scrollTop( $( slideMenu ).attr('data-pos') );
			}
		}
	} );

	/* Remove :after pseudo-element from linked images */
	function linkedImages() {
		var imgs = $( '.entry-content img' );

		for ( var i = 0, imgslength = imgs.length; i < imgslength; i++ ) {
			if ( '' !== $( imgs[i] ).closest( 'a' ) ) {
				$( imgs[i] ).closest( 'a' ).addClass( 'no-line' );
			}
		}
	}

	/* Scroll to content on single posts */
	function scrollToContent() {
		$( '#scroll-to-content' ).click( function(e) {

			e.preventDefault();

			var link = $( this ).attr( 'href' );

			body.animate({
		        scrollTop: $( link ).offset().top - 45
		    }, 700 );
		});
	}

	/* Highlight labels in comment reply form on focus */
	function formLabels() {

		$( '.comment-form input, .comment-form textarea' ).focus(
			function(e) {
				e.preventDefault();
				$( this ).prev( 'label' ).addClass( 'label-focus' );
			}
		).focusout(
			function(e) {
				e.preventDefault();
				$( this ).prev( 'label' ).removeClass( 'label-focus' );
			}
		);

	}

	/*
	 * Wrap tiled galleries so we can outdent them
	 */
	function galleryWrapper() {
		var gallery = $( '.entry-content' ).find( '.tiled-gallery' );

		//If this tiled gallery has not yet been wrapped, add a wrapper
		if ( ! gallery.parent().hasClass( 'tiled-gallery-wrapper' ) ) {
			gallery.wrap( '<div class="tiled-gallery-wrapper"></div>' );
			gallery.resize();
		}
	}

	/*
	 * Add an extra class to large images and videos to outdent them
	 */
	function outdentMedia() {
		$( '.entry-content img' ).each( function() {
			var img = $( this ),
			    caption = $( this ).closest( 'figure' ),
				new_img = new Image();

				new_img.src = img.attr( 'src' );

				$( new_img ).load( function() {

					var img_width = new_img.width;
					if ( img_width >= 1000 ) {
						$( img ).addClass( 'size-big' );
					}

					if ( caption.hasClass( 'wp-caption' ) && img_width >= 1000 ) {
						caption.addClass( 'size-big' );
					}
				} );
		} );
		
		$( '.entry-content .jetpack-video-wrapper' ).each( function() {
			if ( $( this ).find( ':first-child' ).width >= 800 ) {
				$( this ).addClass( 'caption-big' );
			}
		} );
	}

	// After DOM is ready
	$( document ).ready( function() {
		slideControl();
		galleryWrapper();
	} );

	// After window loads
	$( window ).load( function() {
		outdentMedia();
		linkedImages();
		formLabels();
		scrollToContent();
	} );

	// After window is resized or infinite scroll loads new posts
	$( window ).on( 'resize post-load', function() {
		galleryWrapper();
		outdentMedia();
		linkedImages();
	} );

} )( jQuery );
