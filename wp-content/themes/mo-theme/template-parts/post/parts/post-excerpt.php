<?php
/**
 * Displays the post excerpt.
 *
 * Only if the post has an excerpt defined, and we are on an archive page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new MoThemeHTMLComponent();

$attributes = apply_filters(
	'mo_theme_post_excerpt_attributes',
	array(
		'block'    => 'post',
		'element'  => 'excerpt',
	)
);

$title = apply_filters(
	'mo_theme_post_excerpt_title',
	array(
		'title' => 'Post excerpt',
	)
);
?>

<aside <?php $component->attributes->display( $attributes ); ?>>
	<?php $component->title->display( $title ); ?>

	<div <?php $component->text_wrapper->display(); ?>>
		<?php the_excerpt(); ?>
	</div>
</aside>
