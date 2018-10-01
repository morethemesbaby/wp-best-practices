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
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

$post_klass_array = array(
	'post',
	'post-with-sidebar',
	'post-format-quote',
);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_klass_array ); ?>>
	<?php get_template_part( 'template-parts/post-sidebar/post-sidebar', 'left' ); ?>

	<div class="post-content-between-sidebars">
		<?php get_template_part( 'template-parts/post/parts/post', 'sticky' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'title' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'content' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'permalink-if-no-title' ); ?>
	</div>

	<?php get_template_part( 'template-parts/post-sidebar/post-sidebar', 'right' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
