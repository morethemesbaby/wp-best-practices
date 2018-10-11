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


define( FEATURE_BOOK_CUSTOM_POST_TYPE, 'FEATURE_BOOK_CUSTOM_POST_TYPE' );

function mo_pro_theme_define_theme_support() {
	echo 'defining theme support';
	add_theme_support( FEATURE_BOOK_CUSTOM_POST_TYPE );
}
add_action( 'after_setup_theme', 'mo_pro_theme_define_theme_support', 10, 0 );


function mo_pro_theme_check_theme_support() {
	if ( current_theme_supports( FEATURE_BOOK_CUSTOM_POST_TYPE ) ) {
		echo "theme ::: supports;;";
	} else {
		echo "theme ::: No support;;";
	}

	global $_wp_theme_features;
	print_r($_wp_theme_features);
}
add_action( 'after_setup_theme', 'mo_pro_theme_check_theme_support', 11, 0 );




