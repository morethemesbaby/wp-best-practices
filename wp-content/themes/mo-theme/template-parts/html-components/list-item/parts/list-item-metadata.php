<?php
/**
 * List item metadata.
 *
 * This is usually a HTML element.
 *
 * @link https://material.io/design/components/lists.html
 * @link http://material-components-web.appspot.com/list.html
 *
 * @package Log_Lolla_Theme
 */

$list_item_part_metadata_query_vars_defaults = array(
	'primary-text' => '',
	'metadata'     => '',
	'url'          => '',
	'metadata-url' => '',
);

$list_item_part_metadata_query_vars = array_merge(
	$list_item_part_metadata_query_vars_defaults,
	get_query_var( 'list-item-part-metadata-query-vars' )
);

$list_item_primary_text = $list_item_part_metadata_query_vars['primary-text'];
$list_item_metadata     = $list_item_part_metadata_query_vars['metadata'];
$list_item_url          = $list_item_part_metadata_query_vars['url'];
$list_item_metadata_url = $list_item_part_metadata_query_vars['metadata-url'];


if ( log_lolla_theme_empty( $list_item_metadata ) ) {
	return;
}
?>

<div class="list-item-metadata">
	<?php
	if ( ! empty( $list_item_metadata_url ) ) {
		set_query_var( 'link-url', $list_item_url );
		set_query_var( 'link-title', $list_item_primary_text );
		set_query_var( 'link-content', $list_item_metadata );
		get_template_part( 'template-parts/framework/design/typography/elements/link/link' );
	} else {
		echo wp_kses_post( $list_item_metadata );
	}
	?>
</div>
