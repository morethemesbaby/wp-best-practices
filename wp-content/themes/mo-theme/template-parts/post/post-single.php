<?php
/**
 * Displays a single post.
 *
 * It contains:
 * * A Post sticky template part.
 * * A Post title without link template part.
 * * A Post featured image template part.
 * * A Post content template part.
 * * A Post paginated content template part.
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new Mo_Theme_Components();
$mopost    = new Mo_Theme_TemplateTags_Post();

$attributes = apply_filters(
	'mo_theme_post_single_attributes',
	array(
		'block'        => 'post',
		'element'      => 'single',
		'custom_class' => $mopost->get_class(),
		'custom_id'    => 'post-' . get_the_ID(),
	)
);

?>

<article <?php $component->attributes->display( $attributes ); ?>>
	<?php get_template_part( 'template-parts/post/parts/post', 'sticky' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'title-without-link' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'featured-image' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'content' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'paginated-content' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
