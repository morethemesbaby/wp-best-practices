<?php
/**
 * Displays the post author linking to the post
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new Mo_Theme_Components();

$attributes = apply_filters(
	'mo_theme_post_author_linking_to_post_attributes',
	array(
		'block'   => 'post',
		'element' => 'excerpt',
	)
);

$title = apply_filters(
	'mo_theme_post_author_linking_to_post_title',
	array(
		'title' => 'Post author linking to post',
	)
);

$arrows_attributes = apply_filters(
	'mo_theme_post_author_linking_to_post_arrows',
	array(
		'number'    => 3,
		'direction' => 'top',
	)
);
?>

<aside <?php $component->attributes->display( $attributes ); ?>>
	<?php $component->title->display( $title ); ?>

	<?php $component->arrows->display( $arrows_attributes ); ?>

	<div class="post-author-link">
		<?php
			printf(
				'<a class="link" href="%1$s" title="%2$s">%3$s%4$s</a>',
				esc_url( get_permalink() ),
				the_title_attribute( 'echo=0' ),
				/* Translators: The `status update by` text for the Status post format. */
				esc_html_x( 'status update by ', 'status update by', 'mo-theme' ),
				esc_html( get_the_author() )
			);
		?>
	</div>
</aside>
