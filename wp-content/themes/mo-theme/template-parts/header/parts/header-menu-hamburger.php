<?php
/**
 * Displays a navigation menu icon (hamburger menu) in the header.
 *
 * It is only displayed if there is a custom function to provide content for the header menu
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new Mo_Theme_Components();
$header    = new Mo_Theme_TemplateTags_Header();

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

$icon_closed_attributes = apply_filters(
	'mo_theme_header_menu_hamburger_icon_closed_attributes',
	array(
		'block'         => 'header-menu-hamburger-icon',
		'element'       => '',
		'modifier'      => 'closed',
		'display_class' => true,
		'display_id'    => false,
	)
);

$icon_opened_attributes = apply_filters(
	'mo_theme_header_menu_hamburger_icon_opened_attributes',
	array(
		'block'         => 'header-menu-hamburger-icon',
		'element'       => '',
		'modifier'      => 'opened',
		'display_class' => true,
		'display_id'    => false,
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

		<div <?php $component->attributes->display( $icon_closed_attributes ); ?>>
			<span class="icon">&#x2630;</span>
		</div>

		<div <?php $component->attributes->display( $icon_opened_attributes ); ?>>
			<span class="icon">&times;</span>
		</div>
	</nav>
	<?php
}
