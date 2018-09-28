<?php
/**
 * Displays the site header.
 *
 * It contains:
 * * A Header image template part.
 * * A Header logo template part.
 * * A Header title template part.
 * * A Header subtitle template part.
 * * A Header hamburger menu template part.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LogLollaTheme
 * @since 1.0.0
 */

if ( function_exists( 'log_lolla_theme_get_header_class' ) ) {
	$klass = log_lolla_theme_get_header_class();
} else {
	$klass = '';
}
?>

<header class="header <?php echo esc_attr( $klass ); ?>">
	<?php get_template_part( 'template-parts/header/parts/header', 'image' ); ?>
	<?php get_template_part( 'template-parts/header/parts/header', 'logo' ); ?>
	<?php get_template_part( 'template-parts/header/parts/header', 'title' ); ?>
	<?php get_template_part( 'template-parts/header/parts/header', 'subtitle' ); ?>
	<?php get_template_part( 'template-parts/header/parts/header', 'menu-hamburger' ); ?>
</header>

<?php get_template_part( 'template-parts/header/parts/header', 'menu' ); ?>
