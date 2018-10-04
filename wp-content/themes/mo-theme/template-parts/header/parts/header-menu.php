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

$attributes = apply_filters(
	'mo_theme_header_menu_attributes',
	array(
		'block'    => 'header',
		'element'  => 'menu',
		'modifier' => 'closed',
	)
);

$title = apply_filters(
	'mo_theme_header_menu_title',
	array(
		'title' => 'Header menu',
	)
);

$header_menu_contents = apply_filters( 'mo_theme_header_display_menu_contents', $header->display_header_menu_contents() );

if ( $header->has_header_menu() ) {
	?>
	<nav <?php $component->attributes->display( $attributes ); ?>>
		<?php $component->title->display( $title ); ?>

		<?php $header_menu_contents; ?>
	</nav>
	<?php
}
