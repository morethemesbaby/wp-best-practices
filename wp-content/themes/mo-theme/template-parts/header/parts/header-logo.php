<?php
/**
 * Displays the header logo.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new MoThemeHTMLComponent();

$aside_attributes = array(
	'block'   => 'header',
	'element' => 'logo',
);

$figure_attributes = array(
	'block'   => 'image',
	'element' => '',
);

if ( has_custom_logo() ) {
	?>
	<aside <?php apply_filter( 'mo_theme_header_logo_attributes', $component->attributes->display( $aside_attributes ) ); ?>>
		<?php apply_filters( 'mo_theme_header_logo_title', $component->title->display( array( 'title' => 'Header logo' ) ) ); ?>

		<figure <?php apply_filters( 'mo_theme_header_logo_figure_attributes', $component->attributes->display( $figure_attributes ) ); ?>>
			<?php
				if ( function_exists( 'the_custom_logo' ) ) {
					the_custom_logo();
				}
			?>
		</figure>
	</aside>
	<?php
}
