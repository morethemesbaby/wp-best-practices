<?php
/**
 * Displays a triangle.
 *
 * @param string $trinagle_direction The direction of the triangle.
 * @param string $triangle_klass The additional klass of this component.
 *
 * @package MoTheme
 * @since 1.0.0
 */

$mo        = new MoThemeBase();
$component = new MoThemeHTMLComponent();

$triangle_query_vars = $mo->get_query_var(
	array(
		'direction' => 'top',
		'klass'     => '',
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
