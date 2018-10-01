<?php
/**
 * Displays the post author linking to the post.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

?>

<aside class="post-author-linking-to-post">
	<h3 class="hidden">Post author linking to post</h3>

	<?php echo wp_kses_post( log_lolla_theme_get_arrow_html( 'top' ) ); ?>
	<?php echo wp_kses_post( log_lolla_theme_get_arrow_html( 'top' ) ); ?>
	<?php echo wp_kses_post( log_lolla_theme_get_arrow_html( 'top' ) ); ?>

	<div class="post-author-link">
		<a class="link" href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>">
			<?php
			/* translators: The `status update by` text for the Status post format. */
			echo esc_html_x( 'status update by ', 'status update by', 'log-lolla-theme' );
			echo esc_html( get_the_author() );
			?>
		</a>
	</div>
</aside>
