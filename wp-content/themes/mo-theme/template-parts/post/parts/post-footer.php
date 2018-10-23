<?php
/**
 * Displays the post date, author, categories and tags
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new Mo_Theme_Components();

$attributes = apply_filters(
	'mo_theme_post_footer_attributes',
	array(
		'block'   => 'post',
		'element' => 'footer',
	)
);

$title = apply_filters(
	'mo_theme_post_footer_title',
	array(
		'title' => 'Post footer',
	)
);

?>

<aside <?php $component->attributes->display( $attributes ); ?>>
	<?php $component->title->display( $title ); ?>

	<div class="list">
		<?php get_template_part( 'template-parts/post/parts/post', 'topics' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'date' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'author' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'edit-link' ); ?>
	</div>
</aside>
