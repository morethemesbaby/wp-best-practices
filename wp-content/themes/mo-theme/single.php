<?php
/**
 * Displays a single post.
 *
 * The page contains:
 *  * The Single post format template part.
 *  * The Post footer template part.
 *  * The Comment list template part.
 *  * The Post navigation template part.
 *
 * @link https://morethemes.baby/blog/2018/05/21/tech-platforms-and-the-knowledge-problem/ Live example
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ WordPress documentation
 *
 * @package MoTheme
 * @since 1.0.0
 */

get_header();

$component = new MoThemeHTMLComponent();

$attributes = apply_filters(
	'mo_theme_single_attributes',
	array(
		'block' => 'single',
	)
);

$title = apply_filters(
	'mo_theme_single_title',
	array(
		'title' => 'Single post',
	)
);
?>

<section <?php $component->attributes->display( $attributes ); ?>>
	<?php $component->title->display( $title ); ?>

	<?php
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/post/post', 'single' );
			get_template_part( 'template-parts/post/parts/post', 'footer' );
			get_template_part( 'template-parts/comment/comment', 'list' );
			get_template_part( 'template-parts/navigation/navigation', 'for-post' );
		}
	?>
</section>

<?php
get_footer();
