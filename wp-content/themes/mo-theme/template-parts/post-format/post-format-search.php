<?php
/**
 * Displays results in search pages.
 *
 * It contains:
 * * A Post sticky template part.
 * * A Post title template part.
 * * A Post featured permalink template part.
 * * A Post date template part.
 *
 * @package MoTheme
 * @since 1.0.0
 */

$mopost    = new MoThemePost();
$component = new MoThemeHTMLComponent();

$attributes = apply_filters(
	'mo_theme_post_format_search_attributes',
	array(
		'block'        => 'post',
		'element'      => 'format',
		'custom_class' => 'post-search',
		'custom_id'    => 'post-' . get_the_ID(),
	)
);
?>

<article <?php $component->attributes->display( $attributes ); ?>>
	<?php do_action( 'mo_theme_before_post_format_search' ); ?>

	<?php get_template_part( 'template-parts/post/parts/post', 'sticky' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'title' ); ?>
	<?php
		if ( ! $mopost->has_title() ) {
			get_template_part( 'template-parts/post/parts/post', 'permalink' );
		}
	?>
	<?php get_template_part( 'template-parts/post/parts/post', 'date' ); ?>

	<?php do_action( 'mo_theme_after_post_format_search' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
