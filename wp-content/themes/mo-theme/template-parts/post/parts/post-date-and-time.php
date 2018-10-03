<?php
/**
 * Displays post date and time.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

$component = new MoThemeHTMLComponent();

$attributes = apply_filters(
	'mo_theme_post_date_and_time_attributes',
	array(
		'block'    => 'post',
		'element'  => 'date-and-time',
	)
);

$title = apply_filters(
	'mo_theme_post_date_and_time_title',
	array( 'title' => 'Post date and time' )
);
?>

<aside <?php $component->attributes->display( $attributes ); ?>>
	<?php $component->title->display( $title ); ?>

	<div class="posted-on">
		<?php 
			echo sprintf(
				'<time class="date published" datetime="%1$s">%2$s</time>',
				esc_attr( get_the_date( 'c' ) . ', ' . get_the_time( 'c' ) ),
				esc_html( get_the_date() . ', ' . get_the_time() )
			);
		?>
	</div>
</aside>
