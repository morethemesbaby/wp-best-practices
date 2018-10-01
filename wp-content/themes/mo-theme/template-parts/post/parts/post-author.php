<?php
/**
 * Displays the post author.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

?>

<aside class="post-author">
	<h3 class="hidden">Post author</h3>

	<div class="posted-by">
		<?php
		/* translators: The `by` text before the post author. */
		echo esc_html_x( 'by', 'post author', 'log-lolla-theme' );
		?>

		<span class="post-author-link">
			<a class="link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
				<?php echo esc_html( get_the_author() ); ?>
			</a>
		</span>
	</div>
</aside>
