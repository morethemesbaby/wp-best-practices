<?php
/**
 * Displays the list item primary text.
 *
 * This must be always present.
 *
 * @link https://material.io/design/components/lists.html
 * @link http://material-components-web.appspot.com/list.html
 *
 * @package Log_Lolla_Theme
 */

$list_item_part_primary_text_query_vars_defaults = array(
	'primary-text' => '',
	'url'          => '',
);

$list_item_part_primary_text_query_vars = array_merge(
	$list_item_part_primary_text_query_vars_defaults,
	get_query_var( 'list-item-part-primary-text-query-vars' )
);

$list_item_primary_text = $list_item_part_primary_text_query_vars['primary-text'];
$list_item_url          = $list_item_part_primary_text_query_vars['url'];
?>


<h3 class="list-item-primary-text">
	<?php
	if ( ! empty( $list_item_url ) ) {
		set_query_var( 'link-url', $list_item_url );
		set_query_var( 'link-title', $list_item_primary_text );
		set_query_var( 'link-content', $list_item_primary_text );
		get_template_part( 'template-parts/framework/design/typography/elements/link/link' );
	} else {
		echo wp_kses_post( $list_item_primary_text );
	}
	?>
</h3>
