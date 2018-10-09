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
 * Use Composer's autoload.
 */
if ( file_exists( get_template_directory() . '/vendor/autoload.php' ) ) {
	require_once 'vendor/autoload.php';
}

/**
 * Sets up the theme.
 *
 * @since 1.0.0
 * @var object $mo_plugin The main plugin object.
 */
$mo_plugin = new MoPluginSetup(
	apply_filters( 'mo_plugin_setup_array',
		array()
	)
);
