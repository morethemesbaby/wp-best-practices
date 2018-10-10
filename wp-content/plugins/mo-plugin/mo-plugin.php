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
 * Activate / deactivate the theme
 *
 * @since 1.0.0
 *
 * @link https://developer.wordpress.org/plugins/the-basics/activation-deactivation-hooks/
*/
function mo_register() {
	$labels = array(
        'name'                  => _x( 'Books', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Book', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Books', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Book', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Book', 'textdomain' ),
        'new_item'              => __( 'New Book', 'textdomain' ),
        'edit_item'             => __( 'Edit Book', 'textdomain' ),
        'view_item'             => __( 'View Book', 'textdomain' ),
        'all_items'             => __( 'All Books', 'textdomain' ),
        'search_items'          => __( 'Search Books', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Books:', 'textdomain' ),
        'not_found'             => __( 'No books found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No books found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'book' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );
 
    register_post_type( 'book', $args );

}
add_action( 'init', 'mo_register' );

function mo_activate() {
	mo_register();
	flush_rewrite_rules();
}

function mo_deactivate() {
	unregister_post_type( 'book' );
	flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'mo_activate' );
register_deactivation_hook( __FILE__, 'mo_deactivate' );



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


