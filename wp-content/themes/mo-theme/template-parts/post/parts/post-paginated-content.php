<?php
/**
 * Displays navigation for paginated post content
 *
 * @link https://codex.wordpress.org/Styling_Page-Links
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new Mo_Theme_Components();

$attributes = apply_filters(
	'mo_theme_post_paginated_content_attributes',
	array(
		'block'   => 'post',
		'element' => 'paginated-content',
	)
);

$title = apply_filters(
	'mo_theme_post_paginated_content_title',
	array(
		'title' => 'Post paginated content',
	)
);


/* translators: The `Pages:` text for the post pagination. */
$title = __( 'Pages:', 'mo-theme' );

// Cannot be wrapped into an <ul>,<li> structure ....
$wp_link_pages = wp_link_pages(
	array(
		'before'    => '<span class="page-links-title">' . $title . '</span><div class="ul page-links">',
		'after'     => '</div>',
		'separator' => '&nbsp;',
		'echo'      => 0,
	)
);


if ( ! empty( $wp_link_pages ) ) {
	?>
	<nav <?php $component->attributes->display( $attributes ); ?>>
		<?php $component->title->display( $title ); ?>

		<div <?php $component->text_wrapper->display(); ?>>
			<?php echo wp_kses_post( $wp_link_pages ); ?>
		</div>
	</nav>
	<?php
}
?>
