<?php
/**
 * Displays the list item secondary text.
 *
 * @link https://material.io/design/components/lists.html
 * @link http://material-components-web.appspot.com/list.html
 *
 * @package Log_Lolla_Theme
 */

$list_item_part_secondary_text_query_vars_defaults = array(
	'secondary-text' => '',
);

$list_item_part_secondary_text_query_vars = array_merge(
	$list_item_part_secondary_text_query_vars_defaults,
	get_query_var( 'list-item-part-secondary-text-query-vars' )
);

$list_item_secondary_text = $list_item_part_secondary_text_query_vars['secondary-text'];

if ( empty( $list_item_secondary_text ) ) {
	return;
}
?>

<div class="list-item-secondary-text">
	<?php echo wp_kses_post( $list_item_secondary_text ); ?>
</div>
