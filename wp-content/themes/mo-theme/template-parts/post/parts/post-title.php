<?php
/**
 * Displays a post title
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component  = new Mo_Theme_Components();

$attributes = apply_filters(
	'mo_theme_post_title_attributes',
	array(
		'block'   => 'post',
		'element' => 'title',
	)
);

$arguments = apply_filters(
	'mo_theme_post_title_arguments',
	$component->get_query_var(
		array(
			'name'     => 'post-title-query-vars',
			'defaults' => array(
				'link_class' => 'link',
				'link_url'   => get_permalink(),
				'link_title' => the_title_attribute( 'echo=0' ),
			),
		)
	)
);

the_title(
	sprintf(
		'<h3 %1$s><a class="%2$s" href="%3$s" title="%4$s">',
		$component->attributes->get( $attributes ),
		esc_attr( $arguments['link_class'] ),
		esc_url( $arguments['link_url'] ),
		esc_attr( $arguments['link_title'] )
	),
	'</a></h3>'
);

