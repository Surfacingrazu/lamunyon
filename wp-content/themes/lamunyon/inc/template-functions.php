<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package lamunyon
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function lamunyon_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'lamunyon_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function lamunyon_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'lamunyon_pingback_header' );


add_filter("use_block_editor_for_post_type", "disable_gutenberg_editor");
function disable_gutenberg_editor()
{
	return false;
}


// Theme options acf

function lamunyon_acf_options_page_settings( $settings )
{
    $settings['pages'] = array('General Settings');
    return $settings;
}

add_filter('acf/options_page/settings', 'lamunyon_acf_options_page_settings');

if( function_exists('acf_set_options_page_title') )
{
    acf_set_options_page_title( __('Lamunyon Settings') );
}

add_filter('wpcf7_autop_or_not', '__return_false');