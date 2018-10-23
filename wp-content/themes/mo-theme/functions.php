<?php
/**
 * Sets up the global variables and the theme.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MoTheme
 * @since 1.0.0
 */

/**
 * Defines the WordPress.org functionality set.
 *
 * These functionalities will be implemented by the theme.
 *
 * @since 1.0.0
 *
 * @link https://developer.wordpress.org/themes/functionality/
 *
 * @var string Identifies the WordPress.org functionality set.
 */
define( 'FUNCTIONALITY_SET_WPORG', 'wporg' );

/**
 * Use Composer's autoload.
 *
 * This makes sure all classes are loaded dynamically instead of being included manually.
 *
 * @link https://getcomposer.org/doc/01-basic-usage.md#autoloading
 */
if ( file_exists( get_template_directory() . '/vendor/autoload.php' ) ) {
	require_once 'vendor/autoload.php';
}

/**
 * Sets up the theme.
 *
 * Tells to the theme setup class:
 * - Which functionalities to implement.
 * - Where to find the assets which needs to be included.
 *
 * @since 1.0.0
 * @var object The main theme object.
 */
$mo_theme = new Mo_Theme_Setup(
	apply_filters( 'mo_theme_setup_array',
		array(
			'include_folder'    => 'includes/',
			'functionality_set' => FUNCTIONALITY_SET_WPORG,
			'assets'            => array(
				'src_url'           => get_template_directory_uri(),
				'folder'            => '',
				'javascript_folder' => 'assets/js',
				'css_folder'        => '',
				'css_file_name'     => 'style',
			),
		)
	)
);

$text_domain = ( isset( $mo_theme->text_domain ) ) ? $mo_theme->text_domain : 'text-domain';

/**
 * Defines the theme text domain.
 *
 * This will be used later for various tasks like creating a query cache id.
 *
 * @since 1.0.0
 *
 * @var string
 */
define( 'THEME_TEXT_DOMAIN', $text_domain );
