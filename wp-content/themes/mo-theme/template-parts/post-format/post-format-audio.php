<?php
/**
 * Displays an Audio post.
 *
 * Audio – An audio file. Could be used for Podcasting.
 *
 * @link https://developer.wordpress.org/themes/functionality/post-formats/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new Mo_Theme_Components();

$attributes = apply_filters(
	'mo_theme_post_format_audio_attributes',
	array(
		'block'        => 'post',
		'custom_class' => 'post-format-audio',
		'custom_id'    => 'post-' . get_the_ID(),
	)
);
?>

<article <?php $component->attributes->display( $attributes ); ?>>
	<?php do_action( 'mo_theme_before_post_format_audio' ); ?>

	<?php get_template_part( 'template-parts/post/parts/post', 'sticky' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'title' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'content' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'permalink-if-no-title' ); ?>

	<?php do_action( 'mo_theme_after_post_format_audio' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
