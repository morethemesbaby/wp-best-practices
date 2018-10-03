<?php
/**
 * Template part for displaying a list
 *
 * @package Log_Lolla_Theme
 */

$list_query_vars_defaults = array(
	'klass' => '',
	'title' => '',
	'items' => '',
);

$list_query_vars = array_merge(
	$list_query_vars_defaults,
	get_query_var( 'list-query-vars' )
);

$list_klass = $list_query_vars['klass'];
$list_title = $list_query_vars['title'];
$list_items = $list_query_vars['items'];

if ( $list_items ) {
	?>
	<section class="list <?php echo esc_attr( $list_klass ); ?>">
		<h3 class="list-title">
			<?php echo wp_kses_post( $list_title ); ?>
		</h3>

		<div class="list-items">
			<?php echo wp_kses_post( $list_items ); ?>
		</div>
	</section>
	<?php
}
?>
