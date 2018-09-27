<?php
/**
 * Sets up the theme.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MoTheme
 * @since 1.0.0
 */

// Useful global constants.
define( 'INCLUDE_FOLDER', 'includes/' );

// Include main functions.
require_once get_template_directory() . '/' . INCLUDE_FOLDER . '/class-motheme.php';

// Run the setup.
$mo_theme = new MoTheme(
	array(
		'include_folder'    => INCLUDE_FOLDER,
		'assets_folder'     => 'assets/',
		'functionality_set' => 'wporg',
		'customization_set' => 'wporg',
	)
);
