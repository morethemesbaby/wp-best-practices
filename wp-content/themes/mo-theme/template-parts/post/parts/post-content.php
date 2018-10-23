<?php
/**
 * Displays the post content
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new Mo_Theme_Components();

$attributes = apply_filters(
	'mo_theme_post_content_attributes',
	array(
		'block'   => 'post',
		'element' => 'content',
	)
);

$title = apply_filters(
	'mo_theme_post_content_title',
	array(
		'title' => 'Post content',
	)
);
?>

<aside <?php $component->attributes->display( $attributes ); ?>>
	<?php $component->title->display( $title ); ?>

	<div <?php $component->text_wrapper->display(); ?>>
		<?php the_content(); ?>
	</div>
</aside>
