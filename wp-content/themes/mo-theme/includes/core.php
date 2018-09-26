<?php
/**
 * Sets up the theme core features and functions.
 *
 * @package MoTheme
 * @subpackage Core
 * @since 1.0.0
 */

namespace MoTheme\Core;

/**
 * Sets up theme defaults and registers supported WordPress features.
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'wp_enqueue_scripts', $n( 'styles' ) );
	add_action( 'wp_enqueue_scripts', $n( 'scripts' ) );
}


/**
 * Includes theme styles
 *
 * @return void
 */
function styles() {
	$timestamp = filemtime( MO_THEME_PATH . '/style.css' );

	wp_enqueue_style(
		MO_THEME_TEXT_DOMAIN . '-style',
		get_stylesheet_uri(),
		array(),
		MO_THEME_VERSION . '-' . $timestamp
	);
}

/**
 * Includes theme scripts
 *
 * @return void
 */
function scripts() {
	$file_name     = 'js/' . MO_THEME_TEXT_DOMAIN . '.js';
	$file_location = get_theme_file_uri( '/' . MO_THEME_ASSETS );
	$timestamp     = filemtime( MO_THEME_PATH . MO_THEME_ASSETS . $file_name );

	wp_enqueue_script(
		MO_THEME_TEXT_DOMAIN . '-script',
		$file_location . $file_name,
		array(),
		MO_THEME_VERSION . '-' . $timestamp
	);
}
