<?php
/**
 * Displays post navigation in a loop.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

$args = array(
	'prev_text' => log_lolla_theme_get_arrow_html( 'left' ) . 'Older',
	'next_text' => log_lolla_theme_get_arrow_html( 'right' ) . 'Newer',
);

echo wp_kses_post( the_posts_navigation( $args ) );
