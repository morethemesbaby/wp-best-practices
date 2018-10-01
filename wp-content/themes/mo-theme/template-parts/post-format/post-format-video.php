<?php
/**
 * Displays a Video post
 *
 * Video – A single video. The first <video /> tag or object/embed in the post content
 * could be considered the video.
 * Alternatively, if the post consists only of a URL, that will be the video URL.
 * May also contain the video as an attachment to the post,
 * if video support is enabled on the blog (like via a plugin).
 *
 * @link https://developer.wordpress.org/themes/functionality/post-formats/
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

$post_klass_array = array(
	'post',
	'post-with-sidebar',
	'post-format-video',
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
