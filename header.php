<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Scrawl
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/prism.css" type="text/css" media="screen" />
<script type="text/javascript" src=<?php bloginfo('template_url'); ?>/prism.js"></script>
<link href="/wp-content/themes/scrawl/prism.css" rel="stylesheet" />
<script type="text/javascript" src="https://blog.mayuko.cn/siyue-api/?encode=js&charset=utf-8"></script>


</head>

<body <?php body_class(); ?>>
<?php if ( is_active_sidebar( 'sidebar-1' ) || has_nav_menu( 'primary' ) || has_nav_menu ( 'social' ) ) : ?>
	<button class="menu-toggle x">
		<span class="lines"></span>
		<span class="screen-reader-text"><?php _e( 'Primary Menu', 'scrawl' ); ?></span>
	</button>
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
			</nav><!-- #site-navigation -->
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) {
			get_sidebar();
		} ?>
	</div><!-- .slide-menu -->
<?php endif; ?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'scrawl' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<div class="site-branding">
			<?php if ( function_exists( 'jetpack_the_site_logo' ) && has_site_logo() ) {
					jetpack_the_site_logo();
				} elseif ( '' !== get_theme_mod( 'scrawl_gravatar_email', '' ) ) {
					scrawl_get_gravatar();
				} 
			?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</div>

	</header><!-- #masthead -->

	<?php if ( get_header_image() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img class="custom-header" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
		</a>
	<?php endif;  // End header image check. ?>

	<?php // Single post header images */

		  if ( is_single() && has_post_thumbnail() ) : ?>
		<div class="featured-header-image">
			<?php the_title( '<h1 class="entry-title"><a id="scroll-to-content" href="#post-' . get_the_ID() . '">', '</a></h1>' ); ?>
		</div>
	<?php endif; ?>

	<div id="content" class="site-content">

