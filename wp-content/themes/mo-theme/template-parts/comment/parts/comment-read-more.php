<?php
/**
 * Displays the "Read more" link for a comment excerpt
 *
 * @package Log_Lolla_Pro_Theme
 * @since 1.0.0
 */

?>

<div class="comment-read-more">
	<?php
	printf(
		'<a class="link comment-read-more-link" href="%1$s" title="%2$s">%3$s</a>',
		esc_url( get_comment_link( $comment ) ),
		esc_attr( get_the_title( $comment->comment_post_ID ) ),
		wp_kses_post( log_lolla_theme_add_readmore_to_content() )
	);
	?>
</div>
