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
 * @package LogLollaTheme
 * @since 1.0.0
 */

$post_klass_array = array(
	'post',
	'post-with-sidebar',
	'post-format-image',
);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_klass_array ); ?>>
	<?php get_template_part( 'template-parts/post-sidebar/post-sidebar', 'left' ); ?>

	<div class="post-content-between-sidebars">
		<?php get_template_part( 'template-parts/post/parts/post', 'sticky' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'title' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'first-image' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'permalink-if-no-title' ); ?>
	</div>

	<?php get_template_part( 'template-parts/post-sidebar/post-sidebar', 'right' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
