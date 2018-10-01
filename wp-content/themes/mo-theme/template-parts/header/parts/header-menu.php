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
$header    = new MoThemeHeader();
$nav       = array(
	'block'    => 'header',
	'element'  => 'menu',
	'modifier' => 'closed',
);

if ( apply_filters( 'mo_theme_header_has_header_menu', $header->has_header_menu() ) ) {
	?>
	<nav <?php apply_filters( 'mo_theme_header_menu_attributes', $component->attributes->display( $nav ) ); ?>>
		<?php apply_filters( 'mo_theme_header_menu_title', $component->title->display( array( 'title' => 'Header menu' ) ) ); ?>

		<?php apply_filters( 'mo_theme_header_display_header_menu_contents', $header->display_heder_menu_contents() ); ?>
	</nav>
	<?php
}
