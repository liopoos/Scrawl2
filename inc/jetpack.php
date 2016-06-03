<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Scrawl
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */

function scrawl_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container'      => 'main',
		'footer'         => 'page',
	) );

    /**
     * Add theme support for Responsive Videos.
     */
    add_theme_support( 'jetpack-responsive-videos' );

    /**
     * Add theme support for site logos
     */
     add_theme_support( 'site-logo', array( 'size' => 'scrawl-site-logo' ) );
}
add_action( 'after_setup_theme', 'scrawl_jetpack_setup' );
