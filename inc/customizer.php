<?php
/**
 * Scrawl Theme Customizer
 *
 * @package Scrawl
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function scrawl_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	$wp_customize->add_section( 'scrawl_theme_options', array(
		'title'             => __( 'Theme', 'scrawl' ),
		'priority'          => 35,
	) );

	$wp_customize->add_setting( 'scrawl_gravatar_email', array(
		'default'           => '',
		'sanitize_callback' => 'scrawl_sanitize_email',
	) );

	$wp_customize->add_control( 'scrawl_gravatar_email', array(
		'label'             => __( 'Gravatar Email', 'scrawl' ),
		'section'           => 'scrawl_theme_options',
		'type'              => 'text',
		'priority'          => 1,
	) );

}
add_action( 'customize_register', 'scrawl_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function scrawl_customize_preview_js() {
	wp_enqueue_script( 'scrawl-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'scrawl_customize_preview_js' );


/* Sanitize email function for scrawl_gravatar_email sanitize_callback */
function scrawl_sanitize_email( $value ) {

	if ( '' != $value && is_email( $value ) )
		$value = sanitize_email( $value );
	else
		$value = '';

	return $value;
}