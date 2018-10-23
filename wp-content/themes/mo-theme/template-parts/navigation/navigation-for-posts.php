<?php
/**
 * Displays post navigation in a loop.
 *
 * @link https://developer.wordpress.org/themes/functionality/pagination/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new Mo_Theme_Components();

$arrow_left_attributes = apply_filters(
	'mo_theme_navigation_for_posts_arrow_left_attributes',
	array(
		'number'    => 1,
		'direction' => 'left',
	)
);

$arrow_right_attributes = apply_filters(
	'mo_theme_navigation_for_posts_arrow_right_attributes',
	array(
		'number'    => 1,
		'direction' => 'right',
	)
);

/* Translators: The `Older` text for posts navigation. */
$older = esc_html_x( 'Older', 'older', 'mo-theme' );

/* Translators: The `Newer` text for posts navigation. */
$newer = esc_html_x( 'Newer', 'newer', 'mo-theme' );

$args = array(
	'prev_text' => $component->arrows->get( $arrow_left_attributes ) . $older,
	'next_text' => $component->arrows->get( $arrow_right_attributes ) . $newer,
);

echo wp_kses_post( the_posts_navigation( $args ) );
