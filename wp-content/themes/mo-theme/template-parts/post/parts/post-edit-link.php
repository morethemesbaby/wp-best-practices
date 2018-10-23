<?php
/**
 * Displays the post edit link
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new Mo_Theme_Components();

$attributes = apply_filters(
	'mo_theme_post_post_edit_link_attributes',
	array(
		'block'   => 'post',
		'element' => 'edit-link',
	)
);

$title = apply_filters(
	'mo_theme_post_edit_link_title',
	array(
		'title' => 'Post edit link',
	)
);

if ( is_user_logged_in() ) {
	?>
	<aside <?php $component->attributes->display( $attributes ); ?>>
		<?php $component->title->display( $title ); ?>

		<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'mo-theme' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</aside>
	<?php
}
?>
