<?php
/**
 * Displays the post permalink
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new Mo_Theme_Components();

$attributes = apply_filters(
	'mo_theme_post_permalink_attributes',
	array(
		'block'   => 'post',
		'element' => 'permalink',
	)
);

$title = apply_filters(
	'mo_theme_post_permalink_title',
	array(
		'title' => 'Post permalink',
	)
);
?>

<aside <?php $component->attributes->display( $attributes ); ?>>
	<?php $component->title->display( $title ); ?>

	<div class="permalink">
		<?php
			echo sprintf(
				'<a class="link" href="%1$s" title="%2$s">%3$s</a>',
				esc_url( get_permalink() ),
				the_title_attribute( 'echo=0' ),
				/* Translators: %s: post permalink. */
				esc_html( '&infin;', 'post permalink', 'mo-theme' )
			);
		?>
	</div>
</aside>
