<?php
/**
 * Displays a list of comments.
 *
 * It contains:
 * * A List title Comment template part
 * * A series of Single comments template parts
 *
 * @package Log_Lolla_Pro_Theme
 * @since 1.0.0
 */

if ( post_password_required() ) {
	return;
}

$mocomments = new MoThemeComments();

$comments = $mocomments->get_without_pingback_trackback(
	array(
		'post' => $post,
	)
);

$number_of_comments = count( $comments );

if ( ! $number_of_comments ) {
	return;
}

$component = new MoThemeHTMLComponent();

$attributes = apply_filters(
	'mo_theme_comment_list_attributes',
	array(
		'block'        => 'comment-list',
		'custom_class' => 'list',
		'custom_id'    => 'comments-for-post-' . esc_attr( get_the_ID( $post ) ),
	)
);
?>

<section <?php $component->attributes->display( $attributes ); ?>>
	<?php
		set_query_var( 'number_of_comments', $number_of_comments );
		get_template_part( 'template-parts/comment/parts/comment-list-title', '' );
	?>

	<div class="comment-list-items list-items">
		<?php
			foreach ( $comments as $comment ) {
				get_template_part( 'template-parts/comment/comment', '' );
			}
		?>
	</div>
</section>
