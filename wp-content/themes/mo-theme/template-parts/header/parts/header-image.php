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

$figure_attributes = array(
	'block'   => 'image',
	'element' => '',
);

if ( true ) {
	?>
	<aside <?php $component->attributes->display( $aside_attributes ); ?>>
		<?php $component->title->display( array( 'title' => 'Header image' ) ); ?>

		<figure <?php $component->attributes->display( $figure_attributes ); ?>>
			<?php the_header_image_tag(); ?>
		</figure>
	</aside>
	<?php
}
