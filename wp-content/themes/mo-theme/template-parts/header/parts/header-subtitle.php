<?php
/**
 * Displays the header subtitle
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component  = new Mo_Theme_Components();
$attributes = apply_filters(
	'mo_theme_header_subtitle',
	array(
		'block'   => 'header',
		'element' => 'subtitle',
	)
);

if ( display_header_text() ) {
	echo wp_kses_post(
		sprintf(
			'<h2 %1$s><span %2$s>%3$s</span></h2>',
			$component->attributes->get( $attributes ),
			$component->text_wrapper->get(),
			get_bloginfo( 'description' )
		)
	);
}
