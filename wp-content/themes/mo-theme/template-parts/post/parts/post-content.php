<?php
/**
 * Displays the post content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

$component = new MoThemeHTMLComponent();

$attributes = apply_filters(
	'mo_theme_post_content_attributes',
	array(
		'block'    => 'post',
		'element'  => 'content',
	)
);

$title = apply_filters(
	'mo_theme_post_content_title',
	array(
		'title' => 'Post content',
	)
);
?>

<aside <?php $component->attributes->display( $attributes ); ?>>
	<?php $component->title->display( $title ); ?>

	<div <?php $component->text_wrapper->display(); ?>>
		<?php the_content(); ?>
	</div>
</aside>
