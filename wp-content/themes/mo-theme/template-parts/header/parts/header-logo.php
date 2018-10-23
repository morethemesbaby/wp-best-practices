<?php
/**
 * Displays the header logo
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new Mo_Theme_Components();

$attributes = apply_filters(
	'mo_theme_header_logo_attributes',
	array(
		'block'   => 'header',
		'element' => 'logo',
	)
);

$title = apply_filters(
	'mo_theme_header_logo_title',
	array(
		'title' => 'Header logo',
	)
);

if ( has_custom_logo() ) {
	?>
	<aside <?php $component->attributes->display( $attributes ); ?>>
		<?php $component->title->display( $title ); ?>

		<figure class="logo">
			<?php
				if ( function_exists( 'the_custom_logo' ) ) {
					the_custom_logo();
				}
			?>
		</figure>
	</aside>
	<?php
}
