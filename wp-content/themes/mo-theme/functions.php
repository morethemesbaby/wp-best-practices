<?php
/**
 * Sets up the theme
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MoTheme
 * @since 1.0.0
 */

// Useful constants.
define( 'FUNCTIONALITY_SET_WPORG', 'wporg' );
define( 'CUSTOMIZATION_SET_WPORG', 'wporg' );


// Require Composer autoloader if it exists.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once 'vendor/autoload.php';
}

// Run the setup.
$mo_theme = new MoTheme(
	apply_filters( 'mo_theme_setup_array',
		array(
			'include_folder'    => 'includes/',
			'assets_folder'     => 'assets/',
			'functionality_set' => FUNCTIONALITY_SET_WPORG,
			'customization_set' => CUSTOMIZATION_SET_WPORG,
		)
	)
);
