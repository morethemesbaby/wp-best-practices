<?php
/**
 * Displays the  comment content.
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new MoThemeHTMLComponent();

$attributes = apply_filters(
	'mo_theme_comment_content_attributes',
	array(
		'block'   => 'comment',
		'element' => 'content',
	)
);

$title = apply_filters(
	'mo_theme_comment_content_title',
	array(
		'title' => 'Comment content',
	)
);
?>

<aside <?php $component->attributes->display( $attributes ); ?>>
	<?php $component->title->display( $title ); ?>

	<div <?php $component->text_wrapper->display(); ?>>
		<?php comment_text(); ?>
	</div>
</aside>
