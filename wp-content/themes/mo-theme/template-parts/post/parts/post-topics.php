<?php
/**
 * Displays the post topics
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new Mo_Theme_Components();

$attributes = apply_filters(
	'mo_theme_post_topic_attributes',
	array(
		'block' => 'topic',
	)
);

$topic_container = sprintf(
	'<div %s>',
	$component->attributes->get( $attributes )
);

$categories = get_the_term_list(
	$post->ID,
	'category',
	$topic_container,
	'</div>' . $topic_container,
	'</div>'
);

$tags = get_the_term_list(
	$post->ID,
	'post_tag',
	$topic_container,
	'</div>' . $topic_container,
	'</div>'
);

$all = $categories . $tags;
echo wp_kses_post( $all );
