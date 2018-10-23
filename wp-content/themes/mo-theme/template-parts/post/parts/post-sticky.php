<?php
/**
 * Displays a sticky post label
 *
 * @link https://developer.wordpress.org/themes/functionality/sticky-posts/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component  = new Mo_Theme_Components();
$attributes = apply_filters(
	'mo_theme_post_sticky_attributes',
	array(
		'block'   => 'post',
		'element' => 'sticky',
	)
);

if ( is_sticky() ) {
	echo wp_kses_post(
		sprintf(
			'<div %1$s><span %2$s>%3$s</span></div>',
			$component->attributes->get( $attributes ),
			$component->text_wrapper->get(),
			/* translators: The `Featured` text for the Sticky posts. */
			esc_html_x( 'Featured', 'sticky post text', 'mo-theme' )
		)
	);
}

