<?php
/**
 * Displays a Standard post
 *
 * We would like to display parts of a post in the same way like parts of a page
 * Therefore we add a new class `article` to both posts and pages and style them via this handle
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

$p         = new MoThemePost();
$component = new MoThemeHTMLComponent();

$post_klass_array = array(
	'post-with-sidebar',
	'post-format-standard',
	$p->get_class(),
);

$attributes = apply_filters(
	'mo_theme_post_format_attributes',
	array(
		'block'        => 'post',
		'custom_class' => implode( ' ', $post_klass_array ),
		'custom_id'    => 'post-' . get_the_ID(),
	)
);
?>

<article <?php $component->attributes->display( $attributes ); ?>>
	<?php get_template_part( 'template-parts/post-sidebar/post-sidebar', 'left' ); ?>

	<div class="post-content-between-sidebars">
		<?php get_template_part( 'template-parts/post/parts/post', 'sticky' ); ?>

		<?php
		if ( is_single() ) {
			get_template_part( 'template-parts/post/parts/post', 'title-without-link' );
		} else {
			get_template_part( 'template-parts/post/parts/post', 'title' );
		}
		?>

		<?php get_template_part( 'template-parts/post/parts/post', 'featured-image' ); ?>
		<?php
		if ( ! is_single() && has_excerpt() ) {
			get_template_part( 'template-parts/post/parts/post', 'excerpt' );
		} else {
			get_template_part( 'template-parts/post/parts/post-content', 'standard' );
			get_template_part( 'template-parts/post/parts/post', 'paginated-content' );
		}
		?>
		<?php get_template_part( 'template-parts/post/parts/post', 'permalink-if-no-title' ); ?>
	</div>

	<?php get_template_part( 'template-parts/post-sidebar/post-sidebar', 'right' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
