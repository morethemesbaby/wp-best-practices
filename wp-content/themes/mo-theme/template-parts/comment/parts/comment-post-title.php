<?php
/**
 * Displays the post title associated to a comment
 *
 * @package Log_Lolla_Pro_Theme
 * @since 1.0.0
 */

?>

<a class="link comment-post-title" href="<?php echo esc_url( get_comment_link( $comment ) ); ?>" title="<?php echo esc_attr( get_the_title( $comment->comment_post_ID ) ); ?>">
	<?php echo esc_html( get_the_title( $comment->comment_post_ID ) ); ?>
</a>
