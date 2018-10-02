<?php
/**
 * Displays a post title without the permalink
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component  = new MoThemeHTMLComponent();
$attributes = apply_filters(
	'mo_theme_post_title_without_link_attributes',
	array(
		'block'   => 'post',
		'element' => 'title',
	)
);

the_title(
	sprintf(
		'<h3 %1$s><span %2$s>',
		$component->attributes->get( $attributes ),
		$component->text_wrapper->get()
	),
	'</span></h3>'
);
