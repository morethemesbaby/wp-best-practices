<?php
/**
 * Displays the header image
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new Mo_Theme_Components();

$attributes = apply_filters(
	'mo_theme_header_image_attributes',
	array(
		'block'   => 'header',
		'element' => 'image',
	)
);

$title = apply_filters(
	'mo_theme_header_image_title',
	array(
		'title' => 'Header image',
	)
);

if ( get_header_image() ) {
	?>
	<aside <?php $component->attributes->display( $attributes ); ?>>
		<?php $component->title->display( $title ); ?>

		<figure class="image">
			<?php the_header_image_tag(); ?>
		</figure>
	</aside>
	<?php
}
