<?php
/**
 * Displays an Image post
 *
 * Image – A single image. The first <img /> tag in the post could be considered the image.
 * Alternatively, if the post consists only of a URL, that will be the image URL
 * and the title of the post (post_title) will be the title attribute for the image.
 *
 * @link https://developer.wordpress.org/themes/functionality/post-formats/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new MoThemeHTMLComponent();

$attributes = apply_filters(
	'mo_theme_post_format_image_attributes',
	array(
		'block'        => 'post',
		'custom_class' => 'post-format-image',
		'custom_id'    => 'post-' . get_the_ID(),
	)
);
?>

<article <?php $component->attributes->display( $attributes ); ?>>
	<?php do_action( 'mo_theme_before_post_format_image' ); ?>

	<?php get_template_part( 'template-parts/post/parts/post', 'sticky' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'title' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'first-image' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'permalink-if-no-title' ); ?>

	<?php do_action( 'mo_theme_after_post_format_image' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
