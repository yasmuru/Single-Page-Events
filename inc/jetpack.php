<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Single Page Events
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function sp_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'sp_jetpack_setup' );
