<?php
/**
 * Sets up the global variables and the theme
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MoTheme
 * @since 1.0.0
 */

/**
 * Defines the WordPress.org functionality set.
 *
 * @since 1.0.0
 * @var string
 */
define( 'FUNCTIONALITY_SET_WPORG', 'wporg' );

/**
 * Defines the WordPress.org customization set.
 *
 * @since 1.0.0
 * @var string
 */
define( 'CUSTOMIZATION_SET_WPORG', 'wporg' );

/**
 * Use Composer's autoload.
 */
if ( file_exists( get_template_directory() . '/vendor/autoload.php' ) ) {
	require_once 'vendor/autoload.php';
}

/**
 * Sets up the theme.
 *
 * @since 1.0.0
 * @var object $mo_theme The main theme object.
 */
$mo_theme = new MoThemeSetup(
	apply_filters( 'mo_theme_setup_array',
		array(
			'include_folder'    => 'includes/',
			'assets_folder'     => 'assets/',
			'functionality_set' => FUNCTIONALITY_SET_WPORG,
			'customization_set' => CUSTOMIZATION_SET_WPORG,
		)
	)
);
