<?php
/**
 * Sets up the global variables and the theme
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MoProTheme
 * @since 1.0.0
 */

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
 * @var object
 */
$mo_pro_theme = new MoProThemeSetup(
	apply_filters( 'mo_pro_theme_setup_array',
		array(
			'assets'            => array(
				'src_url'           => get_stylesheet_directory_uri(),
				'folder'            => '',
				'javascript_folder' => 'assets/js',
				'css_folder'        => '',
				'css_file_name'     => 'style',
			),
		)
	)
);
