<?php
/**
 * Template part for displaying the header title
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component  = new Mo_Theme_Components();
$attributes = apply_filters(
	'mo_theme_header_title',
	array(
		'block'   => 'header',
		'element' => 'title',
	)
);


if ( display_header_text() ) {
	echo wp_kses_post(
		sprintf(
			'<h1 %1$s><a class="link" href="%2$s" title="%3$s"><span %4$s>%3$s</span></a></h1>',
			$component->attributes->get( $attributes ),
			esc_url( home_url( '/' ) ),
			get_bloginfo( 'name' ),
			$component->text_wrapper->get()
		)
	);
}
