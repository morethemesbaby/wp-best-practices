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

$mocomment = new MoThemeComment();

$comments = $mocomment->get_without_pingback_trackback(
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
		$arguments = array(
			'query_var_name'     => 'number-of-comments-query-vars',
			'query_var_value'    => array(
				'number_of_comments' => $number_of_comments,
			),
			'template_part_slug' => 'template-parts/comment/parts/comment-list-title',
			'template_part_name' => '',
		);

		echo wp_kses_post( $component->get_template_part( $arguments ) );
	?>

	<div class="comment-list-items list-items">
		<?php
			foreach ( $comments as $comment ) {
				get_template_part( 'template-parts/comment/comment', '' );
			}
		?>
	</div>
</section>
