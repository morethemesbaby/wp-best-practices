<?php
/**
 * Displays a list item.
 *
 * The idea is take from Google's Material Design.
 *
 * @link https://material.io/design/components/lists.html
 * @link http://material-components-web.appspot.com/list.html
 *
 * @package Log_Lolla_Theme
 */

$list_item_query_vars_defaults = array(
	'klass'          => '',
	'primary-text'   => '',
	'secondary-text' => '',
	'avatar'         => '',
	'graphic'        => '',
	'metadata'       => '',
	'icon'           => '',
	'url'            => '',
	'avatar-url'     => '',
	'graphic-url'    => '',
	'metadata-url'   => '',
	'icon-url'       => '',
	'data-attr'      => '',
);

$list_item_query_vars = array_merge(
	$list_item_query_vars_defaults,
	get_query_var( 'list-item-query-vars' )
);

$list_item_class          = $list_item_query_vars['klass'];
$list_item_primary_text   = $list_item_query_vars['primary-text'];
$list_item_secondary_text = $list_item_query_vars['secondary-text'];
$list_item_avatar         = $list_item_query_vars['avatar'];
$list_item_graphic        = $list_item_query_vars['graphic'];
$list_item_metadata       = $list_item_query_vars['metadata'];
$list_item_icon           = $list_item_query_vars['icon'];
$list_item_url            = $list_item_query_vars['url'];
$list_item_avatar_url     = $list_item_query_vars['avatar-url'];
$list_item_graphic_url    = $list_item_query_vars['graphic-url'];
$list_item_metadata_url   = $list_item_query_vars['metadata-url'];
$list_item_icon_url       = $list_item_query_vars['icon-url'];
$list_item_data_attr      = $list_item_query_vars['data-attr'];
?>

<aside class="list-item <?php echo esc_attr( $list_item_class ); ?>" <?php echo esc_attr( $list_item_data_attr ); ?>>
	<?php
	if ( ! log_lolla_theme_empty( $list_item_avatar ) ) {
		$list_item_part_avatar_query_vars = array(
			'primary-text' => $list_item_primary_text,
			'avatar'       => $list_item_avatar,
			'url'          => $list_item_url,
			'avatar-url'   => $list_item_avatar_url,
		);
		set_query_var( 'list-item-part-avatar-query-vars', $list_item_part_avatar_query_vars );
		get_template_part( 'template-parts/framework/structure/list-item/parts/list-item', 'avatar' );
	} elseif ( ! log_lolla_theme_empty( $list_item_graphic ) ) {
		$list_item_part_graphic_query_vars = array(
			'primary-text' => $list_item_primary_text,
			'graphic'      => $list_item_graphic,
			'url'          => $list_item_url,
			'graphic-url'  => $list_item_graphic_url,
		);
		set_query_var( 'list-item-part-graphic-query-vars', $list_item_part_graphic_query_vars );
		get_template_part( 'template-parts/framework/structure/list-item/parts/list-item', 'graphic' );
	}

	if ( ! empty( $list_item_secondary_text ) ) {
		$list_item_part_primary_and_secondary_text_query_vars = array(
			'primary-text'   => $list_item_primary_text,
			'secondary-text' => $list_item_secondary_text,
			'url'            => $list_item_url,
		);
		set_query_var( 'list-item-part-primary-and-secondary-text-query-vars', $list_item_part_primary_and_secondary_text_query_vars );
		get_template_part( 'template-parts/framework/structure/list-item/parts/list-item', 'primary-and-secondary-text' );
	} else {
		$list_item_part_primary_text_query_vars = array(
			'primary-text' => $list_item_primary_text,
			'url'          => $list_item_url,
		);
		set_query_var( 'list-item-part-primary-text-query-vars', $list_item_part_primary_text_query_vars );
		get_template_part( 'template-parts/framework/structure/list-item/parts/list-item', 'primary-text' );
	}

	$list_item_part_metadata_query_vars = array(
		'primary-text' => $list_item_primary_text,
		'metadata'     => $list_item_metadata,
		'url'          => $list_item_url,
		'metadata-url' => $list_item_metadata_url,
	);
	set_query_var( 'list-item-part-metadata-query-vars', $list_item_part_metadata_query_vars );
	get_template_part( 'template-parts/framework/structure/list-item/parts/list-item', 'metadata' );

	$list_item_part_icon_query_vars = array(
		'primary-text' => $list_item_primary_text,
		'icon'         => $list_item_icon,
		'url'          => $list_item_url,
		'icon-url'     => $list_item_icon_url,
	);
	set_query_var( 'list-item-part-icon-query-vars', $list_item_part_icon_query_vars );
	get_template_part( 'template-parts/framework/structure/list-item/parts/list-item', 'icon' );
	?>
</aside>
