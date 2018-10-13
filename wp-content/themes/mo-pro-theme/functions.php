<?php
/**
 * Sets up the theme.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MoProTheme
 * @since 1.0.0
 */


if ( ! function_exists( 'mo_theme_content_div_attributes_filter' ) ) {
	function mo_theme_content_div_attributes_filter() {
		return array( 'block' => 'pro-content' );
	}
}
add_filter( 'mo_theme_content_div_attributes', 'mo_theme_content_div_attributes_filter' );


if ( ! function_exists( 'mo_theme_home_title_filter' ) ) {
	function mo_theme_home_title_filter() {
		return array( 'title' => 'Pro Home' );
	}
}
add_filter( 'mo_theme_home_title', 'mo_theme_home_title_filter' );


if ( ! function_exists( 'mo_theme_header_has_menu_filter' ) ) {
	function mo_theme_header_has_menu_filter() {
		return true;
	}
}
add_filter( 'mo_theme_header_has_menu', 'mo_theme_header_has_menu_filter' );


if ( ! function_exists( 'mo_theme_header_display_menu_contents_filter' ) ) {
	function mo_theme_header_display_menu_contents_filter() {
		echo 'Header menu contents';
	}
}
add_filter( 'mo_theme_header_display_menu_contents', 'mo_theme_header_display_menu_contents_filter' );


if ( ! function_exists( 'mo_theme_before_post_format_action' ) ) {
	function mo_theme_before_post_format_action() {
		echo 'before';
	}
}
add_action( 'mo_theme_before_post_format', 'mo_theme_before_post_format_action' );


// - https://developer.wordpress.org/reference/functions/add_theme_support/
// - if added without hook in the same way is executed after plugin activation
function mo_pro_theme_define_theme_support() {
	add_theme_support(
		'MO_PRO_THEME_FEATURE_SET',
		array(
			'custom-post-type' => true,
			'shortcode'        => true,
		)
	);
}
add_action( 'after_setup_theme', 'mo_pro_theme_define_theme_support', 10, 0 );


// Display a shortcode
function mo_pro_theme_display_book_widget() {
	global $books;
	print_r($books);
}
add_action( 'mo-plugin_books_action_after', 'mo_pro_theme_display_book_widget', 10, 0 );