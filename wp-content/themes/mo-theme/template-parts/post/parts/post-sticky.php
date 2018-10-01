<?php
/**
 * Displays a sticky post label
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component  = new MoThemeHTMLComponent();
$attributes = apply_filters(
	'mo_theme_post_sticky_attributes',
	array(
		'block'   => 'post',
		'element' => 'sticky',
	)
);

if ( is_sticky() ) {
	?>
	<div <?php $component->attributes->display( $attributes ); ?>>
		<span class="text">
			<?php
				/* translators: The `Featured` text for the Sticky posts. */
				echo esc_html_x( 'Featured', 'sticky post text', 'mo-theme' );
			?>
		</span>
	</div>
	<?php
}
?>
