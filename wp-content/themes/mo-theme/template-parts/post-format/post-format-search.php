<?php
/**
 * Displays results in search pages.
 *
 * It contains:
 * * A Post sticky template part.
 * * A Post title template part.
 * * A Post featured permalink template part.
 * * A Post date template part.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LogLollaTheme
 * @since 1.0.0
 */

$klass = 'post post-search';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $klass ); ?>>
	<?php get_template_part( 'template-parts/post/parts/post', 'sticky' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'title' ); ?>
	<?php
		$has_title = the_title_attribute( 'echo=0' );

	if ( ! $has_title ) {
		get_template_part( 'template-parts/post/parts/post', 'permalink' );
	}
	?>
	<?php get_template_part( 'template-parts/post/parts/post', 'date' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
