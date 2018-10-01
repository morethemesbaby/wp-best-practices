<?php
/**
 * Displays the post featured image.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

if ( has_post_thumbnail() ) { ?>

<aside class="post-featured-image">
	<h3 class="hidden">Post featured image</h3>

	<figure class="figure">
		<a class="link" href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail(); ?>
		</a>

		<?php
		the_title(
			'<figcaption class="figcaption"><a class="link" href="' . esc_url( get_permalink() ) . '" title="' . the_title_attribute( 'echo=0' ) . '">',
			'</a></figcaption>'
		);
		?>
	</figure>
</aside>

<?php }
?>
