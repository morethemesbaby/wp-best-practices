<?php
/**
 * Displays post navigation in a loop.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

$component = new MoThemeHTMLComponent();

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
$older = esc_html__( 'Older', 'older', 'mo-theme' );

/* Translators: The `Newer` text for posts navigation. */
$newer = esc_html__( 'Newer', 'newer', 'mo-theme' );

$args = array(
	'prev_text' => $component->arrows->get( $arrow_left_attributes ) . $older,
	'next_text' => $component->arrows->get( $arrow_right_attributes ) . $newer,
);

echo wp_kses_post( the_posts_navigation( $args ) );
