<?php
/**
 * Displays a list item graphic.
 *
 * This is usually a decorative HTML / SVG element.
 *
 * @link https://material.io/design/components/lists.html
 * @link http://material-components-web.appspot.com/list.html
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

$list_item_part_graphic_query_vars_defaults = array(
	'primary-text' => '',
	'graphic'      => '',
	'url'          => '',
	'graphic-url'  => '',
);

$list_item_part_graphic_query_vars = array_merge(
	$list_item_part_graphic_query_vars_defaults,
	get_query_var( 'list-item-part-graphic-query-vars' )
);

$list_item_primary_text = $list_item_part_graphic_query_vars['primary-text'];
$list_item_graphic      = $list_item_part_graphic_query_vars['graphic'];
$list_item_url          = $list_item_part_graphic_query_vars['url'];
$list_item_graphic_url  = $list_item_part_graphic_query_vars['graphic-url'];

if ( log_lolla_theme_empty( $list_item_graphic ) ) {
	return;
}
?>

<div class="list-item-graphic">
	<?php
	if ( ! empty( $list_item_graphic_url ) ) {
		set_query_var( 'link-url', $list_item_url );
		set_query_var( 'link-title', $list_item_primary_text );
		set_query_var( 'link-content', $list_item_graphic );
		get_template_part( 'template-parts/framework/design/typography/elements/link/link' );
	} else {
		echo wp_kses_post( $list_item_graphic );
	}
	?>
</div>
