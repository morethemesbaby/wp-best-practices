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

$number_of_comments = $component->get_query_var(
	array(
		'name' => 'number-of-comments-query-vars',
	)
);
$number_of_comments = empty( $number_of_comments ) ? 0 : reset( $number_of_comments );
?>

<h3 <?php $component->attributes->display( $attributes ); ?>>
	<?php
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
