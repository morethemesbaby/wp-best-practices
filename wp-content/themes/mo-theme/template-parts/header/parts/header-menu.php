<?php
/**
 * Displays a navigation menu in the header
 *
 * It is only displayed if there is a custom function to provide content for the header menu
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new MoThemeHTMLComponent();
$nav       = array(
	'block'    => 'header',
	'element'  => 'menu',
	'modifier' => 'closed',
);

if ( function_exists( 'log_lolla_theme_display_header_menu_contents' ) ) {
	?>
	<nav <?php $component->attributes->display( $nav ); ?>>
		<?php $component->title->display( array( 'title' => 'Header menu' ) ); ?>

		<?php log_lolla_theme_display_header_menu_contents(); ?>
	</nav>
	<?php
}
