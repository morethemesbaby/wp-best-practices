<?php
/**
 * Displays a navigation menu icon (hamburger menu) in the header.
 *
 * It is only displayed if there is a custom function to provide content for the header menu
 *
 * @package MoTheme
 * @since 1.0.0
 */

$element = new MoThemeHTMLElement();
$nav     = array(
	'name'          => 'header-menu-hamburger',
	'modifier'      => 'closed',
	'display_class' => false,
	'display_id'    => true,
);
$icon1   = array(
	'name'          => 'header-menu-hamburger-icon',
	'modifier'      => 'closed',
	'display_class' => true,
	'display_id'    => false,
);
$icon2   = array(
	'name'          => 'header-menu-hamburger-icon',
	'modifier'      => 'opened',
	'display_class' => true,
	'display_id'    => false,
);

if ( true ) {
	?>
	<nav <?php $element->display_attributes( $nav ); ?>>
		<?php
			$component_title_query_vars = array(
				'text' => 'Header menu hamburger',
			);

			set_query_var( 'component-title-query-vars', $component_title_query_vars );
			get_template_part( 'template-parts/framework/structure/component/parts/component-title', '' );
		?>

		<div <?php $element->display_attributes( $icon1 ); ?>>
			<span class="icon">&#x2630;</span>
		</div>

		<div <?php $element->display_attributes( $icon2 ); ?>>
			<span class="icon">&times;</span>
		</div>
	</nav>
	<?php
}
