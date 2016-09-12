<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Scrawl
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
<?php wp_title( '-', true, 'right' ); ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/prism.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery.fatNav.min.css" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/component.css" type="text/css">
<link href="<?php bloginfo('template_url'); ?>/css/loading-header-while-scrolling.css" rel="stylesheet" type="text/css" />
<link href='//cdn.webfont.youziku.com/webfonts/nomal/27416/38965/57bb3979f629d80ed4a9764f.css' rel='stylesheet' type='text/css' />
<script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/modernizr.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.fatNav.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/more.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/nav.js"></script>
</head>

<body <?php body_class(); ?>>
<?php if ( is_active_sidebar( 'sidebar-1' ) || has_nav_menu( 'primary' ) || has_nav_menu ( 'social' ) ) : ?>
<div class="slide-menu">
  <?php if ( function_exists( 'jetpack_the_site_logo' ) && has_site_logo() ) {
				jetpack_the_site_logo();
			} elseif ( '' !== get_theme_mod( 'scrawl_gravatar_email', '' ) ) {
				scrawl_get_gravatar();
			} 
		?>
  <?php if ( has_nav_menu ( 'social' ) ) : ?>
  <?php wp_nav_menu( array( 'theme_location' => 'social', 'depth' => 1, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'container_class' => 'social-links', ) ); ?>
  <?php endif; ?>
  <?php if ( has_nav_menu( 'primary' ) ) : ?>
  <nav id="site-navigation" class="main-navigation" role="navigation">
    <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
  </nav>
  <!-- #site-navigation -->
  <?php endif; ?>
  <?php if ( is_active_sidebar( 'sidebar-1' ) ) {
			get_sidebar();
		} ?>
</div>
<!-- .slide-menu -->
<?php endif; ?>
<div id="page" class="hfeed site">
<a class="skip-link screen-reader-text" href="#content">
<?php _e( 'Skip to content', 'scrawl' ); ?>
</a>
<div id="loading"> </div>
<div class="site-header-image">
<header id="masthead" class="site-header" role="banner" >
<div id="search-header">
  <form role="search" method="get" class="search-form" action="https://blog.mayuko.cn/">
    <label>
      <input type="search" class="search-field" placeholder="搜索(っ °Д °;)っ" value="" name="s" autocomplete="off">
    </label>
    <input type="submit" class="search-submit" value="搜索"  style="display:none;">
  </form>
</div>
<div id="site-text">
  <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Hadestack</a></p>
</div>
<div class="fat-nav">
  <div class="fat-nav__wrapper">
    <ul>
      <li>
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
      </li>
    </ul>
  </div>
  </header>
  <!-- #masthead --> 
</div>
<?php if ( get_header_image() ) : ?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <img class="custom-header" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt=""> </a>
<?php endif;  // End header image check. ?>
<?php // Single post header images */

		  if ( is_single() && has_post_thumbnail() ) : ?>
<div class="featured-header-image">
  <div class="featured-header-bg">
    <?php the_title( '<h1 class="entry-title"><a id="scroll-to-content" href="#post-' . get_the_ID() . '">', '</a></h1>' ); ?>
  </div>
</div>
<?php endif; ?>
<script>
(function() {
    
    $.fatNav();
    
}());
</script> 
<script src="<?php bloginfo('template_url'); ?>/js/classie.js"></script> 
<script>
			(function() {
				var morphSearch = document.getElementById( 'morphsearch' ),
					input = morphSearch.querySelector( 'input.morphsearch-input' ),
					ctrlClose = morphSearch.querySelector( 'span.morphsearch-close' ),
					isOpen = isAnimating = false,
					// show/hide search area
					toggleSearch = function(evt) {
						// return if open and the input gets focused
						if( evt.type.toLowerCase() === 'focus' && isOpen ) return false;

						var offsets = morphsearch.getBoundingClientRect();
						if( isOpen ) {
							classie.remove( morphSearch, 'open' );

							// trick to hide input text once the search overlay closes 
							// todo: hardcoded times, should be done after transition ends
							if( input.value !== '' ) {
								setTimeout(function() {
									classie.add( morphSearch, 'hideInput' );
									setTimeout(function() {
										classie.remove( morphSearch, 'hideInput' );
										input.value = '';
									}, 300 );
								}, 500);
							}
							
							input.blur();
						}
						else {
							classie.add( morphSearch, 'open' );
						}
						isOpen = !isOpen;
					};

				// events
				input.addEventListener( 'focus', toggleSearch );
				ctrlClose.addEventListener( 'click', toggleSearch );
				// esc key closes search overlay
				// keyboard navigation events
				document.addEventListener( 'keydown', function( ev ) {
					var keyCode = ev.keyCode || ev.which;
					if( keyCode === 27 && isOpen ) {
						toggleSearch(ev);
					}
				} );
				
			})();
		</script>
<div id="content" class="site-content">
