<?php
/**
 * Displays the list item primary and secondary text.
 *
 * @link https://material.io/design/components/lists.html
 * @link http://material-components-web.appspot.com/list.html
 *
 * @package Log_Lolla_Theme
 */

$list_item_part_primary_and_secondary_text_query_vars_defaults = array(
	'primary-text'   => '',
	'secondary-text' => '',
	'url'            => '',
);

$list_item_part_primary_and_secondary_text_query_vars = array_merge(
	$list_item_part_primary_and_secondary_text_query_vars_defaults,
	get_query_var( 'list-item-part-primary-and-secondary-text-query-vars' )
);

$list_item_primary_text   = $list_item_part_primary_and_secondary_text_query_vars['primary-text'];
$list_item_secondary_text = $list_item_part_primary_and_secondary_text_query_vars['secondary-text'];
$list_item_url            = $list_item_part_primary_and_secondary_text_query_vars['url'];
?>

<div class="list-item-primary-and-secondary-text">
	<?php
	$list_item_part_primary_text_query_vars = array(
		'primary-text' => $list_item_primary_text,
		'url'          => $list_item_url,
	);
	set_query_var( 'list-item-part-primary-text-query-vars', $list_item_part_primary_text_query_vars );
	get_template_part( 'template-parts/framework/structure/list-item/parts/list-item', 'primary-text' );
	?>

	<?php
	$list_item_part_secondary_text_query_vars = array(
		'secondary-text' => $list_item_secondary_text,
	);
	set_query_var( 'list-item-part-secondary-text-query-vars', $list_item_part_secondary_text_query_vars );
	get_template_part( 'template-parts/framework/structure/list-item/parts/list-item', 'secondary-text' );
	?>
</div>
