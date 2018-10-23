<?php
/**
 * Displays a post gallery
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new Mo_Theme_Components();

$attributes = apply_filters(
	'mo_theme_post_gallery_attributes',
	array(
		'block'   => 'post',
		'element' => 'gallery',
	)
);

$title = apply_filters(
	'mo_theme_post_gallery_title',
	array(
		'title' => 'Post gallery',
	)
);
?>

<aside <?php $component->attributes->display( $attributes ); ?>>
	<?php $component->title->display( $title ); ?>

	<?php
		if ( get_post_gallery() ) {
			echo wp_kses_post( get_post_gallery() );
		}
	?>
</aside>
