<?php
/**
 * Site header
 *
 * Displays the site's header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MoTheme
 * @since 1.0.0
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php get_template_part( 'template-parts/header/header', '' ); ?>

	<?php
		// Opening the content div.
		// .. which will be closed in the footer.
		$component  = new Mo_Theme_Components();
		$attributes = apply_filters(
			'mo_theme_content_div_attributes',
			array(
				'block' => 'content',
			)
		);
	?>
	<div <?php $component->attributes->display( $attributes ); ?>>
