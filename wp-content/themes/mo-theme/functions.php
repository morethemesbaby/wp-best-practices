<?php
/**
 * Sets up the theme.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MoTheme
 * @since 1.0.0
 */

// Require Composer autoloader if it exists.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once 'vendor/autoload.php';
}

// Run the setup.
$mo_theme = new MoTheme(
	array(
		'include_folder'    => 'includes/',
		'assets_folder'     => 'assets/',
		'functionality_set' => 'wporg',
		'customization_set' => 'wporg',
	)
);
