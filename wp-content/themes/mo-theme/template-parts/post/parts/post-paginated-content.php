<?php
/**
 * Displays navigation for paginated post content
 *
 * @link https://codex.wordpress.org/Styling_Page-Links
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

/* translators: The `Pages:` text for the post pagination. */
$title = __( 'Pages:', 'log-lolla-theme' );

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
	<nav class="post-paginated-content">
		<h3 class="hidden">Post paginated content navigation</h3>

		<div class="text">
			<?php echo wp_kses_post( $wp_link_pages ); ?>
		</div>
	</nav>
	<?php
}
?>
