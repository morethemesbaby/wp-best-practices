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


if ( ! function_exists( 'mo_theme_home_title' ) ) {
	function mo_theme_home_title_filter() {
		return array( 'title' => 'Pro Home' );
	}
}
add_filter( 'mo_theme_home_title', 'mo_theme_home_title_filter' );

