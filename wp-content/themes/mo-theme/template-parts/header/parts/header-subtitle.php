<?php
/**
 * Displays the header subtitle.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component  = new MoThemeHTMLComponent();
$attributes = apply_filters(
	'mo_theme_header_subtitle',
	array(
		'block'   => 'header',
		'element' => 'subtitle',
	)
);

if ( display_header_text() ) {
	echo sprintf(
		'<h2 %1$s><span %2$s>%3$s</span></h2>',
		$component->attributes->get( $attributes ),
		$component->text_wrapper->get(),
		get_bloginfo( 'description' )
	);
}
