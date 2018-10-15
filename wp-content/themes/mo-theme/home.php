<?php
/**
 * The home page.
 *
 * Displays a list of posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ Wordpress documentation
 *
 * @package MoTheme
 * @since 1.0.0
 */

get_header();

$component = new MoThemeHTMLComponent();

$attributes = apply_filters(
	'mo_theme_home_attributes',
	array(
		'block' => 'home',
	)
);

$title = apply_filters(
	'mo_theme_home_title',
	array(
		'title' => 'Home',
	)
);
?>

<section <?php $component->attributes->display( $attributes ); ?>>
	<?php
		$component->title->display( $title );
		get_template_part( 'template-parts/post-list/post-list', '' );
	?>
</section>

<?php
get_footer();
