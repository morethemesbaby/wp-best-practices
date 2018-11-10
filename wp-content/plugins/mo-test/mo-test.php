<?php
/**
 * Plugin Name:  Mo Test Plugin
 * Plugin URI:   https://morethemes.baby/themes
 * Description:  A test plugin.
 * Version:      1.0.0
 * Author:       More Themes Baby
 * Author URI:   https://morethemes.baby
 * License:      GNU General Public License v2 or later
 * License URI:  http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:  mo-test-plugin
 * Domain Path:  /languages
 *
 * @package MoTestPlugin
 * @since 1.0.0
 */


if ( ! defined( 'WPINC' ) ) {
	die;
}

global $menu_page_title;
global $menu_title;
global $menu_id;
global $settings_id;
global $settings_features;
global $settings_features_title;

$menu_page_title = 'Mo Theme Settings';
$menu_title = 'Mo Theme Settings';
$menu_id = 'mo-plugin-admin-menu';
$settings_id = 'mo-plugin-settings';
$settings_features = 'mo-plugin-settings-features';
$settings_features_title = 'Theme Features';


function motestplugin_settings_features_test_field_callback() {
	global $settings_features;

	$setting_name = $settings_features . '-test';
	$setting = get_option( $setting_name );
	?>
	<input type="text" name="<?php echo $setting_name; ?>" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
	<?php
}

function motestplugin_settings_features_callback() {
	echo 'Section description';
}


function motestplugin_init_settings() {
	global $menu_id;
	global $settings_id;
	global $settings_features;
	global $settings_features_title;

	register_setting( $menu_id, $settings_id );

	add_settings_section(
		$settings_features,
		$settings_features_title,
		'motestplugin_settings_features_callback',
		$menu_id
	);

	add_settings_field(
		$settings_features . '-test',
		'Test field',
		'motestplugin_settings_features_test_field_callback',
		$menu_id,
		$settings_features
	);
}

function motestplugin_display_settings() {
	global $menu_id;

	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	// Check if the user have submitted the settings.
	// WordPress will add the "settings-updated" $_GET parameter to the url.
	if ( isset( $_GET['settings-updated'] ) ) {
		// Add settings saved message with the class of "updated".
		add_settings_error(
			'mo-plugin-settings_messages',
			'mo-plugin-settings_message',
			__( 'Settings Saved', 'mo-plugin' ),
			'updated'
		);
	}

	// Show error/update messages.
	settings_errors( 'mo-plugin-settings_messages' );

	// Display the form.
	echo '<div class="wrap"><h1 class="wp-heading-inline">';
	echo esc_html( get_admin_page_title() ) . '</h1>';
	echo '<form action="options.php" method="post">';

	// Display security fields.
	settings_fields( $menu_id );

	// Display the settings fields.
	do_settings_sections( $menu_id );

	// Display the submit button.
	submit_button( 'Save Settings' );

	echo '</form></div>';
}


function motestplugin_add_admin_menu() {
	global $menu_page_title;
	global $menu_title;
	global $menu_id;

	add_menu_page(
		$menu_page_title,
		$menu_title,
		'manage_options',
		$menu_id,
		'motestplugin_display_settings',
		'',
		100
	);
}

add_action( 'admin_menu', 'motestplugin_add_admin_menu' );
add_action( 'admin_init', 'motestplugin_init_settings' );


function motestplugin_activate_plugin() {
	//
}

function motestplugin_deactivate_plugin() {
	//
}

function motestplugin_uninstall_plugin() {
	//	
}

register_activation_hook( __FILE__, 'motestplugin_activate_plugin' );
register_deactivation_hook( __FILE__, 'motestplugin_deactivate_plugin' );
register_uninstall_hook( __FILE__, 'motestplugin_uninstall_plugin' );

