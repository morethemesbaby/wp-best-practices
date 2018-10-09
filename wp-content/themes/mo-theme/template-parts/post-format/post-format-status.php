<?php
/**
 * Displays a Status post
 *
 * Status – A short status update, similar to a Twitter status update.
 *
 * @link https://developer.wordpress.org/themes/functionality/post-formats/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new MoThemeHTMLComponent();

$attributes = apply_filters(
	'mo_theme_post_format_status_attributes',
	array(
		'block'        => 'post',
		'custom_class' => 'post-format-status',
		'custom_id'    => 'post-' . get_the_ID(),
	)
);
?>

<article <?php $component->attributes->display( $attributes ); ?>>
	<?php do_action( 'mo_theme_before_post_format_status' ); ?>

	<?php get_template_part( 'template-parts/post/parts/post', 'date-and-time' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'sticky' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'title' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'content' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'author-linking-to-post' ); ?>

	<?php do_action( 'mo_theme_after_post_format_status' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
