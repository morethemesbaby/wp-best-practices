<?php
/**
 * Displays the permalink associated to a comment
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new MoThemeHTMLComponent();

$attributes = apply_filters(
	'mo_theme_comment_permalink_attributes',
	array(
		'block'   => 'comment',
		'element' => 'permalink',
	)
);

$title = apply_filters(
	'mo_theme_comment_permalink_title',
	array(
		'title' => 'Comment permalink',
	)
);
?>

<aside <?php $component->attributes->display( $attributes ); ?>>
	<?php $component->title->display( $title ); ?>

	<?php
		printf(
			'<a class="link" href="%1$s" title="%2$s">%3$s</a>',
			esc_url( get_comment_link( $comment ) ),
			/* translators: The comment permalink title attribute ( <a title="" ...>). */
			esc_attr( esc_html_x( 'Comment permalink', 'comment permalink title', 'mo-theme' ) ),
			/* translators: The comment permalink text. */
			esc_html_x( '&infin;', 'comment permalink text', 'mo-theme' )
		);
	?>
</aside>
