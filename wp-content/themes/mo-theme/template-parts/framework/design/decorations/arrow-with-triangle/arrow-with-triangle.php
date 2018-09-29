<?php
/**
 * Displays an arrow with triangle.
 *
 * It contains:
 * * A Triangle from the Framework decorations template part.
 *
 * @param string $arrow_direction The direction of the arrow.
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

$arrow_direction = get_query_var( 'arrow_direction' );
?>

<span class="arrow-with-triangle arrow-with-triangle--<?php echo esc_attr( $arrow_direction ); ?>">
	<span class="arrow-with-triangle__line"></span>

	<?php
	set_query_var( 'triangle_direction', $arrow_direction );
	set_query_var( 'triangle_klass', 'arrow-with-triangle__triangle' );
	get_template_part( 'template-parts/framework/design/decorations/triangle/triangle', '' );
	?>
</span>
