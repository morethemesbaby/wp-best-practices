<?php
/**
 * Displays the post excerpt
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new Mo_Theme_Components();

$attributes = apply_filters(
	'mo_theme_post_excerpt_attributes',
	array(
		'block'   => 'post',
		'element' => 'excerpt',
	)
);

$title = apply_filters(
	'mo_theme_post_excerpt_title',
	array(
		'title' => 'Post excerpt',
	)
);
?>

<aside <?php $component->attributes->display( $attributes ); ?>>
	<?php $component->title->display( $title ); ?>

	<div <?php $component->text_wrapper->display(); ?>>
		<?php the_excerpt(); ?>
	</div>
</aside>
