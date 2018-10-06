<?php
/**
 * Displays the comment excerpt.
 *
 * The `comment_excerpt()` returns just simple plain text with all HTML tags stripped out.
 * We will need to manually create a nice excerpt with HTML tags.
 *
 * It contains:
 * * A Read more comment template part.
 *
 * @package Log_Lolla_Pro_Theme
 * @since 1.0.0
 */

?>

<aside class="comment-excerpt">
	<h3 class="hidden">Comment excerpt</h3>

	<div class="text">
		<?php echo wp_kses_post( log_lolla_theme_get_comment_excerpt_with_html_tags( $comment ) ); ?>
	</div>

	<?php get_template_part( 'template-parts/comment/parts/comment', 'read-more' ); ?>
</aside>
