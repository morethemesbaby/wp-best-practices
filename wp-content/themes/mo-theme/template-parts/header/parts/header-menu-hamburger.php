<?php
/**
 * Displays a navigation menu icon (hamburger menu) in the header.
 *
 * It is only displayed if there is a custom function to provide content for the header menu
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new MoThemeHTMLComponent();
$header    = new MoThemeHeader();

$attributes = apply_filters(
	'mo_theme_header_menu_hamburger_nav_attributes',
	array(
		'block'         => 'header-menu-hamburger',
		'element'       => '',
		'modifier'      => 'closed',
		'display_class' => true,
		'display_id'    => true,
	)
);

$title = apply_filters(
	'mo_theme_header_menu_hamburger_nav_title',
	array(
		'title' => 'Header menu hamburger',
	)
);

if ( $header->has_header_menu() ) {
	?>
	<nav <?php $component->attributes->display( $attributes ); ?>>
		<?php $component->title->display( $title ); ?>

		<div class="icon--closed">
			<span class="icon">&#x2630;</span>
		</div>

		<div class="icon--opened">
			<span class="icon">&times;</span>
		</div>
	</nav>
	<?php
}
