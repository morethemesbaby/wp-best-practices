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


add_action( 'wp_enqueue_scripts', 'mo_pro_theme_enqueue_scripts', 100 );
/**
 * Add parent theme scripts.
 *
 * And / or remove child theme scripts.
 *
 * @since 1.0.0
 * @return void
 */
function mo_pro_theme_enqueue_scripts() {
	wp_dequeue_script( 'mo-pro-theme' );

	$mo_assets = new MoAssets(
		array(
			'src_url'              => get_template_directory_uri(),
			'javascript_file_name' => 'mo-theme',
			'text-domain'          => 'mo-theme',
		)
	);

	$mo_assets->add_script();
}
