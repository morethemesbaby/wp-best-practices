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
 * Text Domain:  mo-pro-plugin
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
		array()
	)
);
