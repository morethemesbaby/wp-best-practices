<?php
/**
 * Displays an Aside post.
 *
 * Aside – Typically styled without a title. Similar to a Facebook note update.
 *
 * @link https://developer.wordpress.org/themes/functionality/post-formats/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new Mo_Theme_Components();

$attributes = apply_filters(
	'mo_theme_post_format_aside_attributes',
	array(
		'block'        => 'post',
		'custom_class' => 'post-format-aside',
		'custom_id'    => 'post-' . get_the_ID(),
	)
);
?>

<article <?php $component->attributes->display( $attributes ); ?>>
	<?php do_action( 'mo_theme_before_post_format_aside' ); ?>

	<?php get_template_part( 'template-parts/post/parts/post', 'sticky' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'title' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'content' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'permalink' ); ?>

	<?php do_action( 'mo_theme_after_post_format_aside' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
