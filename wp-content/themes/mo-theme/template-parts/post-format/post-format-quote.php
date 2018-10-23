<?php
/**
 * Displays a Quote post
 *
 * Quote – A quotation. Probably will contain a blockquote holding the quote content.
 * Alternatively, the quote may be just the content, with the source/author being the title.
 *
 * We go with the second option: we assume everything is a quote, and we don't style an eventual quote inside
 *
 * @link https://developer.wordpress.org/themes/functionality/post-formats/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new Mo_Theme_Components();

$attributes = apply_filters(
	'mo_theme_post_format_quote_attributes',
	array(
		'block'        => 'post',
		'custom_class' => 'post-format-quote',
		'custom_id'    => 'post-' . get_the_ID(),
	)
);
?>

<article <?php $component->attributes->display( $attributes ); ?>>
	<?php do_action( 'mo_theme_before_post_format_quote' ); ?>

	<?php get_template_part( 'template-parts/post/parts/post', 'sticky' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'title' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'content' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'permalink-if-no-title' ); ?>

	<?php do_action( 'mo_theme_after_post_format_quote' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
