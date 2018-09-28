<?php
/**
 * Displays the header subtitle.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LogLollaTheme
 * @since 1.0.0
 */

if ( display_header_text() ) {
	?>
	<h2 class="header-subtitle">
		<span class="text">
			<?php bloginfo( 'description' ); ?>
		</span>
	</h2>
	<?php
}
