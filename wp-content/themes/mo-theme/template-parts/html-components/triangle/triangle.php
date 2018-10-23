<?php
/**
 * Displays a triangle.
 *
 * @package MoTheme
 * @since 1.0.0
 */

$mo        = new Mo_Theme_Base();
$component = new Mo_Theme_Components();

$triangle_query_vars = $mo->get_query_var(
	array(
		'name'     => 'triangle_query_vars',
		'defaults' => array(
			'direction' => 'top',
			'klass'     => '',
		),
	)
);

$triangle_klass     = $triangle_query_vars['klass'];
$triangle_direction = $triangle_query_vars['direction'];

$attributes = apply_filters(
	'mo_theme_post_triangle_attributes',
	array(
		'block'        => 'triangle',
		'modifier'     => $triangle_direction,
		'custom_klass' => $triangle_klass,
	)
);
?>

<span <?php $component->attributes->display( $attributes ); ?>>
</span>
