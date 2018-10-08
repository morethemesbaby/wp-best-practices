<?php
/**
 * Displays an arrow with triangle.
 *
 * It contains:
 * * A Triangle from the Framework decorations template part.
 *
 * @param string $arrow_direction The direction of the arrow.
 *
 * @package MoTheme
 * @since 1.0.0
 */

$mo        = new MoThemeBase();
$component = new MoThemeHTMLComponent();

$arrow_direction_query_vars = $mo->get_query_var(
	array(
		'name'     => 'arrow_direction',
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

<span <?php $component->attributes->display( $attributes ); ?>">
	<span class="arrow-with-triangle__line"></span>

	<?php
		set_query_var(
			'triangle',
			array(
				'direction' => $arrow_direction,
				'klass'     => 'arrow-with-triangle__triangle',
			)
		);
		get_template_part( 'template-parts/html-components/triangle/triangle', '' );
	?>
</span>
