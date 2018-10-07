<?php
/**
 * Displays the title of a comment list
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new MoThemeHTMLComponent();

$attributes = apply_filters(
	'mo_theme_comment_list_title_attributes',
	array(
		'block'        => 'comment-list',
		'element'      => 'title',
		'custom_class' => 'list-title',
	)
);

$arrows_attributes = apply_filters(
	'mo_theme_comment_list_title_arrows',
	array(
		'number'    => 3,
		'direction' => 'bottom',
	)
);
?>

<h3 <?php $component->attributes->display( $attributes ); ?>>
	<?php
		$number_of_comments = get_query_var( 'number_of_comments' );

		if ( 1 === $number_of_comments ) {
			/* translators: The Comment section title for a single comment. */
			$text = esc_html_x( 'One update', 'one comment', 'mo-theme' );
		} else {
			/* translators: The Comment section title for multiple comments. */
			$text = $number_of_comments . esc_html_x( ' updates', ' comments', 'mo-theme' );
		}

		printf(
			'<span class="arrows">%1$s</span><span class="number-of-comments">%2$s</span><span class="arrows">%1$s</span>',
			wp_kses_post( $component->arrows->get( $arrows_attributes ) ),
			esc_html( $text )
		);
	?>
</h3>
