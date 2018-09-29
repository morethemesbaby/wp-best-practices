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

$nav_attributes   = array(
	'block'         => 'header-menu-hamburger',
	'element'       => '',
	'modifier'      => 'closed',
	'display_class' => false,
	'display_id'    => true,
);
$icon1_attributes = array(
	'element'       => 'icon',
	'modifier'      => 'closed',
	'display_class' => true,
	'display_id'    => false,
);
$icon2_attributes = array(
	'modifier' => 'opened',
);

if ( function_exists( 'log_lolla_theme_display_header_menu_contents' ) ) {
	?>
	<nav <?php $component->attributes->display( $nav_attributes ); ?>>
		<?php $component->title->display( array( 'title' => 'Header menu hamburger' ) ); ?>

		<div <?php $component->attributes->display( $icon1_attributes ); ?>>
			<span class="icon">&#x2630;</span>
		</div>

		<div <?php $component->attributes->display( $icon2_attributes ); ?>>
			<span class="icon">&times;</span>
		</div>
	</nav>
	<?php
}
