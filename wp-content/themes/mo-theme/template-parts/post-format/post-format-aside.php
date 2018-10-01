<?php
/**
 * Displays an Aside post.
 *
 * Aside – Typically styled without a title. Similar to a Facebook note update.
 *
 * @link https://developer.wordpress.org/themes/functionality/post-formats/
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

$post_klass_array = array(
	'post',
	'post-with-sidebar',
	'post-format-aside',
);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_klass_array ); ?>>
	<?php get_template_part( 'template-parts/post-sidebar/post-sidebar', 'left' ); ?>

	<div class="post-content-between-sidebars">
		<?php get_template_part( 'template-parts/post/parts/post', 'sticky' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'content' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'permalink' ); ?>
	</div>

	<?php get_template_part( 'template-parts/post-sidebar/post-sidebar', 'right' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
