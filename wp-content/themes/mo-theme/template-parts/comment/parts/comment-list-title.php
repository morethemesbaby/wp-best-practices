<?php
/**
 * Displays the title of a comment list
 *
 * @package MoTheme
 * @since 1.0.0
 */

?>

<h3 class="comment-list-title list-title">
	<?php
		$number_of_comments = get_query_var( 'number_of_comments' );

		if ( 1 === $number_of_comments ) {
			/* translators: The Comment section title for a single comment. */
			$text = esc_html_x( 'One update', 'one comment', 'mo-theme' );
		} else {
			/* translators: The Comment section title for multiple comments. */
			$text = $number_of_comments . esc_html_x( ' updates', ' comments', 'mo-theme' );
		}

		$arrows  = log_lolla_theme_get_arrow_html( 'bottom' );
		$arrows .= log_lolla_theme_get_arrow_html( 'bottom' );
		$arrows .= log_lolla_theme_get_arrow_html( 'bottom' );

		printf(
			'<span class="arrows">%1$s</span><span class="number-of-comments">%2$s</span><span class="arrows">%3$s</span>',
			wp_kses_post( $arrows ),
			esc_html( $text ),
			wp_kses_post( $arrows )
		);
	?>
</h3>
