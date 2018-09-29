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
	'block'         => 'header',
	'element'       => 'menu',
	'modifier'      => 'closed',
	'display_class' => true,
	'display_id'    => false,
);

if ( function_exists( 'log_lolla_theme_display_header_menu_contents' ) ) {
	?>
	<nav <?php $component->attributes->display( $nav ); ?>>
		<?php
			$component_title_query_vars = array(
				'text' => 'Header menu',
			);

			set_query_var( 'component-title-query-vars', $component_title_query_vars );
			get_template_part( 'template-parts/framework/structure/component/parts/component-title', '' );
		?>

		<?php log_lolla_theme_display_header_menu_contents(); ?>
	</nav>
	<?php
}
