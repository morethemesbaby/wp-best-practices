<?php
/**
 * Displays the header image.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$element = new MoThemeHTMLElement();

if ( get_header_image() ) {
	?>
	<aside <?php $element->display_attributes( array( 'name' => 'header-image' ) ); ?>>
		<?php
			$component_title_query_vars = array(
				'text' => 'Header image',
			);

			set_query_var( 'component-title-query-vars', $component_title_query_vars );
			get_template_part( 'template-parts/framework/structure/component/parts/component-title', '' );
		?>

		<figure <?php $element->display_attributes( array( 'name' => 'image' ) ); ?>>
			<?php the_header_image_tag(); ?>
		</figure>
	</aside>
	<?php
}
