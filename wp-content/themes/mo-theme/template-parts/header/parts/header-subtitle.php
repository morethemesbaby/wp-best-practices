<?php
/**
 * Displays the header subtitle.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new MoThemeHTMLComponent();

$attributes = apply_filters(
	'mo_theme_header_subtitle',
	array(
		'block'   => 'header',
		'element' => 'subtitle',
	)
);

if ( display_header_text() ) {
	?>
	<h2 <?php $component->attributes->display( $attributes ); ?>>
		<span class="text">
			<?php bloginfo( 'description' ); ?>
		</span>
	</h2>
	<?php
}
