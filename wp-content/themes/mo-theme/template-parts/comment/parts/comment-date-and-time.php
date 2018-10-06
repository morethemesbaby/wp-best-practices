<?php
/**
 * Displays the comment date and time.
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new MoThemeHTMLComponent();

$attributes = apply_filters(
	'mo_theme_comment_date_and_time_attributes',
	array(
		'block'   => 'comment',
		'element' => 'date-and-time',
	)
);

$title = apply_filters(
	'mo_theme_comment_date_and_time_title',
	array(
		'title' => 'Comment date and time',
	)
);
?>

<aside <?php $component->attributes->display( $attributes ); ?>>
	<?php $component->title->display( $title ); ?>

	<?php
		printf(
			'<div class="posted-on"><time class="date published" datetime="%1$s">%2$s</time></div>',
			esc_attr( get_comment_date( 'c' ) . ', ' . get_comment_time( 'c' ) ),
			esc_html( get_comment_date() . ', ' . get_comment_time() )
		);
	?>
</aside>
