<?php
/**
 * Displays a navigation menu icon (hamburger menu) in the header.
 *
 * It is only displayed if there is a custom function to provide content for the header menu
 *
 * @package LogLollaTheme
 * @since 1.0.0
 */

if ( function_exists( 'log_lolla_theme_display_header_menu_contents' ) ) {
	?>
	<nav class="header-menu-hamburger header-menu-hamburger--closed">
		<?php
			$component_title_query_vars = array(
				'text' => 'Header menu hamburger',
			);

			set_query_var( 'component-title-query-vars', $component_title_query_vars );
			get_template_part( 'template-parts/framework/structure/component/parts/component-title', '' );
		?>

		<div class="header-menu-hamburger-icon header-menu-hamburger-icon--closed">
			<span class="icon">&#x2630;</span>
		</div>

		<div class="header-menu-hamburger-icon header-menu-hamburger-icon--opened">
			<span class="icon">&times;</span>
		</div>
	</nav>
	<?php
}
