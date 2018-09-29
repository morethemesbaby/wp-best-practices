<?php
/**
 * Displays a list item avatar.
 *
 * This is an image with optionally a link.
 *
 * @link https://material.io/design/components/lists.html
 * @link http://material-components-web.appspot.com/list.html
 *
 * @package Log_Lolla_Theme
 */

$list_item_part_avatar_query_vars_defaults = array(
	'primary-text' => '',
	'avatar'       => '',
	'url'          => '',
	'avatar-url'   => '',
);

$list_item_part_avatar_query_vars = array_merge(
	$list_item_part_avatar_query_vars_defaults,
	get_query_var( 'list-item-part-avatar-query-vars' )
);

$list_item_primary_text = $list_item_part_avatar_query_vars['primary-text'];
$list_item_avatar       = $list_item_part_avatar_query_vars['avatar'];
$list_item_url          = $list_item_part_avatar_query_vars['url'];
$list_item_avatar_url   = $list_item_part_avatar_query_vars['avatar-url'];

if ( empty( $list_item_avatar ) ) {
	return;
}
?>

<figure class="list-item-avatar">
	<?php
	if ( ! empty( $list_item_avatar_url ) ) {
		set_query_var( 'link-url', $list_item_url );
		set_query_var( 'link-title', $list_item_primary_text );
		set_query_var( 'link-content', $list_item_avatar );
		get_template_part( 'template-parts/framework/design/typography/elements/link/link' );
	} else {
		echo wp_kses_post( $list_item_avatar );
	}
	?>

	<figcaption class="figcaption">
		<?php echo wp_kses_post( $list_item_primary_text ); ?>
	</figcaption>
</figure>
