<?php
/**
 * Displays a post title
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component  = new MoThemeHTMLComponent();
$attributes = apply_filters(
	'mo_theme_post_title_attributes',
	array(
		'block'   => 'post',
		'element' => 'title',
	)
);

the_title(
	sprintf(
		'<h3 %1$s><a class="link" href="%2$s" title="%3$s">',
		$component->attributes->get( $attributes ),
		esc_url( get_permalink() ),
		the_title_attribute( 'echo=0' )
	),
	'</a></h3>'
);

