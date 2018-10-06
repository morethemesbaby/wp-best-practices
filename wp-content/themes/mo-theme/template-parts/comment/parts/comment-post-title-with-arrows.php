<?php
/**
 * Displays the post title associated to a comment, with arrows
 *
 * @package Log_Lolla_Pro_Theme
 * @since 1.0.0
 */

?>

<aside class="comment-post-title-with-arrows">
	<h3 class="comment-title">
		<?php
		get_template_part( 'template-parts/comment/parts/comment', 'updated-text' );

		set_query_var( 'comment', $comment );
		get_template_part( 'template-parts/comment/parts/comment', 'post-title' );
		?>
	</h3>

	<?php echo wp_kses_post( log_lolla_theme_get_arrow_html( 'bottom' ) ); ?>
	<?php echo wp_kses_post( log_lolla_theme_get_arrow_html( 'bottom' ) ); ?>
	<?php echo wp_kses_post( log_lolla_theme_get_arrow_html( 'bottom' ) ); ?>
</aside>
