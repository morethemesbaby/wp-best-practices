<?php
/**
 * Displays a Gallery post
 *
 * Gallery – A gallery of images.
 * Post will likely contain a gallery shortcode and will have image attachments.
 *
 * @link https://developer.wordpress.org/themes/functionality/post-formats/
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

$post_klass_array = array(
	'post',
	'post-with-sidebar',
	'post-format-gallery',
);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_klass_array ); ?>>
	<?php get_template_part( 'template-parts/post-sidebar/post-sidebar', 'left' ); ?>

	<div class="post-content-between-sidebars">
		<?php get_template_part( 'template-parts/post/parts/post', 'sticky' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'title' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'gallery' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'permalink-if-no-title' ); ?>
	</div>

	<?php get_template_part( 'template-parts/post-sidebar/post-sidebar', 'right' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
