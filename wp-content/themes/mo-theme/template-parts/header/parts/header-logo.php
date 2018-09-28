<?php
/**
 * Displays the header logo.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$element = new MoThemeHTMLElement();

if ( has_custom_logo() ) {
	?>
	<aside <?php $element->display_attributes( array( 'name' => 'header-logo' ) ); ?>>
		<?php
			$component_title_query_vars = array(
				'text' => 'Header logo',
			);

			set_query_var( 'component-title-query-vars', $component_title_query_vars );
			get_template_part( 'template-parts/framework/structure/component/parts/component-title', '' );
		?>

		<figure <?php $element->display_attributes( array( 'name' => 'logo' ) ); ?>>
			<?php
			if ( function_exists( 'the_custom_logo' ) ) {
				the_custom_logo();
			}
			?>
		</figure>
	</aside>
	<?php
}
