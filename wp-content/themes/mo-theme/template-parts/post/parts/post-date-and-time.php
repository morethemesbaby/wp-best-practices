<?php
/**
 * Displays post date and time
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new Mo_Theme_Components();

$attributes = apply_filters(
	'mo_theme_post_date_and_time_attributes',
	array(
		'block'   => 'post',
		'element' => 'date-and-time',
	)
);

$title = apply_filters(
	'mo_theme_post_date_and_time_title',
	array(
		'title' => 'Post date and time',
	)
);
?>

<aside <?php $component->attributes->display( $attributes ); ?>>
	<?php $component->title->display( $title ); ?>

	<div class="posted-on">
		<?php
			printf(
				'<time class="date published" datetime="%1$s">%2$s</time>',
				esc_attr( get_the_time( 'c' ) ),
				esc_html( get_the_date() . ', ' . get_the_time() )
			);
		?>
	</div>
</aside>
