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

