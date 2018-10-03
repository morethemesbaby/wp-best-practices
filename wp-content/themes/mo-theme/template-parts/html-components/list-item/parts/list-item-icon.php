<?php
/**
 * Displays a list item icon.
 *
 * @link https://material.io/design/components/lists.html
 * @link http://material-components-web.appspot.com/list.html
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

$list_item_part_icon_query_vars_defaults = array(
	'primary-text' => '',
	'icon'         => '',
	'url'          => '',
	'icon-url'     => '',
);

$list_item_part_icon_query_vars = array_merge(
	$list_item_part_icon_query_vars_defaults,
	get_query_var( 'list-item-part-icon-query-vars' )
);

$list_item_primary_text = $list_item_part_icon_query_vars['primary-text'];
$list_item_icon         = $list_item_part_icon_query_vars['icon'];
$list_item_url          = $list_item_part_icon_query_vars['url'];
$list_item_icon_url     = $list_item_part_icon_query_vars['icon-url'];

if ( empty( $list_item_icon ) ) {
	return;
}
?>

<div class="list-item-icon">
	<?php
	if ( ! empty( $list_item_icon_url ) ) {
		set_query_var( 'link-url', $list_item_url );
		set_query_var( 'link-title', $list_item_primary_text );
		set_query_var( 'link-content', $list_item_icon );
		get_template_part( 'template-parts/framework/design/typography/elements/link/link' );
	} else {
		echo wp_kses_post( $list_item_icon );
	}
	?>
</div>
