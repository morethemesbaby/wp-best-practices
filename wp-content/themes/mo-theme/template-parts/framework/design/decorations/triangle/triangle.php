<?php
/**
 * Displays a triangle.
 *
 * @param string $trinagle_direction The direction of the triangle.
 * @param string $triangle_klass The additional klass of this component.
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

$triangle_klass     = get_query_var( 'triangle_klass' );
$triangle_direction = get_query_var( 'triangle_direction' );
?>

<span class="triangle triangle--<?php echo esc_attr( $triangle_direction ); ?> <?php echo esc_html( $triangle_klass ); ?>">
</span>
