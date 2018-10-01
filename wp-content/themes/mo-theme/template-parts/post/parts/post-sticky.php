<?php
/**
 * Displays a sticky post label
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

if ( is_sticky() ) {
	?>
	<div class="post-sticky">
		<span class="text">
		<?php
		/* translators: The `Featured` text for the Sticky posts. */
		echo esc_html_x( 'Featured', 'sticky post text', 'log-lolla-theme' );
		?>
		</span>
	</div>
	<?php
}
?>
