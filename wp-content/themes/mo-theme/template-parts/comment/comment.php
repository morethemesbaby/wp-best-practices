<?php
/**
 * Displays a comment inside a post.
 *
 * It contains:
 * * A Date and time comment template part.
 * * A Content comment template part.
 * * A Permalink comment template part.
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( empty( $comment ) ) {
	return;
}

$component = new MoThemeHTMLComponent();

$attributes = apply_filters(
	'mo_theme_comment_attributes',
	array(
		'block'     => 'comment',
		'custom_id' => 'comment-' . esc_attr( get_comment_id( $comment ) ),
	)
);
?>

<article <?php $component->attributes->display( $attributes ); ?>>
	<?php get_template_part( 'template-parts/comment/parts/comment', 'date-and-time' ); ?>
	<?php get_template_part( 'template-parts/comment/parts/comment', 'content' ); ?>
	<?php get_template_part( 'template-parts/comment/parts/comment', 'permalink' ); ?>
</article>
