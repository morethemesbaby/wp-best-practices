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
$h2        = array(
	'block'   => 'header',
	'element' => 'subtitle',
);

if ( display_header_text() ) {
	?>
	<h2 <?php $component->attributes->display( $h2 ); ?>>
		<span class="text">
			<?php bloginfo( 'description' ); ?>
		</span>
	</h2>
	<?php
}
