<?php
/**
 * Displays the post date
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new Mo_Theme_Components();

$attributes = apply_filters(
	'mo_theme_post_date_attributes',
	array(
		'block'   => 'post',
		'element' => 'date',
	)
);

$title = apply_filters(
	'mo_theme_post_date_title',
	array(
		'title' => 'Post date',
	)
);
?>

<aside <?php $component->attributes->display( $attributes ); ?>>
	<?php $component->title->display( $title ); ?>

	<div class="posted-on">
		<?php
			printf(
				'<time class="date published" datetime="%1$s">%2$s</time>',
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() )
			);
		?>
	</div>
</aside>
