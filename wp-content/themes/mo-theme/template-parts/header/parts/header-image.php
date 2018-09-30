<?php
/**
 * Displays the header image.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new MoThemeHTMLComponent();

$aside_attributes = array(
	'block'   => 'header',
	'element' => 'image',
);

if ( get_header_image() ) {
	?>
	<aside <?php apply_filters( 'mo_theme_header_image_attributes', $component->attributes->display( $aside_attributes ) ); ?>>
		<?php apply_filters( 'mo_theme_header_image_title', $component->title->display( array( 'title' => 'Header image' ) ) ); ?>

		<figure class="image">
			<?php the_header_image_tag(); ?>
		</figure>
	</aside>
	<?php
}
