<?php
/**
 * Plugin Name:  Mo Plugin
 * Plugin URI:   https://morethemes.baby/themes
 * Description:  A WordPress.org boilerplate plugin based on best practices.
 * Version:      1.0.0
 * Author:       More Themes Baby
 * Author URI:   https://morethemes.baby
 * License:      GNU General Public License v2 or later
 * License URI:  http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:  mo-plugin
 * Domain Path:  /languages
 *
 * @package MoPlugin
 * @since 1.0.0
 */

/**
 * If this file is called directly, abort.
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The plugin directory URL.
 *
 * @since 1.0.0
 * @var string
 */
define( 'PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );

/**
 * The plugin directory path.
 *
 * @since 1.0.0
 * @var string
 */
define( 'PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );


/**
 * The plugin file path.
 *
 * @since 1.0.0
 * @var string
 */
define( 'PLUGIN_FILE_PATH', plugin_dir_path( __FILE__ ) . '/mo-plugin.php' );


/**
 * Use Composer's autoload.
 */
if ( file_exists( PLUGIN_DIR_PATH . '/vendor/autoload.php' ) ) {
	require_once 'vendor/autoload.php';
}

/**
 * Sets up the theme.
 *
 * @since 1.0.0
 * @var object
 */
$mo_plugin = new MoPluginSetup(
	apply_filters( 'mo_plugin_setup_array',
		array(
			'has_admin_interface'  => false,
			'has_public_interface' => true,
		)
	)
);

define( FEATURE_BOOK_CUSTOM_POST_TYPE, 'FEATURE_BOOK_CUSTOM_POST_TYPE' );

function mo_plugin_check_theme_support() {
	if ( current_theme_supports( FEATURE_BOOK_CUSTOM_POST_TYPE ) ) {
		echo "plugin ::: supports;;";
		$mo_cpt = new MoPluginCustomPostType();
add_action( 'init', array( $mo_cpt, 'register' ) );
register_activation_hook( __FILE__, array( $mo_plugin, 'activate_plugin' ) );

	} else {
		echo "plugin ::: No support;;";
	}
}
add_action( 'after_setup_theme', 'mo_plugin_check_theme_support', 11, 0 );

/**
 * Activate / deactivate the theme
 *
 * @since 1.0.0
 *
 * @link https://developer.wordpress.org/plugins/the-basics/activation-deactivation-hooks/
*/
//$mo_cpt = new MoPluginCustomPostType();
//add_action( 'init', array( $mo_cpt, 'register' ) );

if ( current_theme_supports( FEATURE_BOOK_CUSTOM_POST_TYPE ) ) {
	echo "plugin outside hook ::: supports;;";
} else {
	echo "plugin outside hook ::: No support;;";
}

//register_activation_hook( __FILE__, array( $mo_plugin, 'activate_plugin' ) );
register_deactivation_hook( __FILE__, array( $mo_plugin, 'deactivate_plugin' ) );

/**
 * Uninstall theme
 *
 * @since 1.0.0
 *
 * @link https://developer.wordpress.org/plugins/the-basics/uninstall-methods/
 */
register_uninstall_hook( __FILE__, array( $mo_plugin, 'uninstall_plugin' ) );
