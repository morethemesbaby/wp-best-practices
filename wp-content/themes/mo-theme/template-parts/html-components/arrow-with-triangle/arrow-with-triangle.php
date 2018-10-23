<?php
/**
 * Displays an arrow with triangle.
 *
 * It contains:
 * * A Triangle from the Framework decorations template part.
 *
 * @package MoTheme
 * @since 1.0.0
 */

$mo        = new Mo_Theme_Base();
$component = new Mo_Theme_Components();

$arrow_direction_query_vars = $mo->get_query_var(
	array(
		'name'     => 'arrow_with_triangle_query_vars',
		'defaults' => array(
			'direction' => 'top',
		),
	)
);

$arrow_direction = $arrow_direction_query_vars['direction'];

$attributes = apply_filters(
	'mo_theme_post_arrow_with_triangle_attributes',
	array(
		'block'    => 'arrow-with-triangle',
		'modifier' => $arrow_direction,
	)
);
?>

<span <?php $component->attributes->display( $attributes ); ?>>
	<span class="arrow-with-triangle__line"></span>

	<?php
		$arguments = array(
			'query_var_name'     => 'triangle_query_vars',
			'query_var_value'    => array(
				'direction' => $arrow_direction,
				'klass'     => 'arrow-with-triangle__triangle',
			),
			'template_part_slug' => 'template-parts/html-components/triangle/triangle',
			'template_part_name' => '',
		);
		$mo->get_template_part( $arguments );
	?>
</span>
