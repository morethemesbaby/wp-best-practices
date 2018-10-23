<?php
/**
 * Displays the post featured image
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new Mo_Theme_Components();

$attributes = apply_filters(
	'mo_theme_post_featured_image_attributes',
	array(
		'block'   => 'post',
		'element' => 'featured-image',
	)
);

$title = apply_filters(
	'mo_theme_post_featured_image_title',
	array(
		'title' => 'Post featued-image',
	)
);

if ( has_post_thumbnail() ) {
	?>
	<aside <?php $component->attributes->display( $attributes ); ?>>
		<?php $component->title->display( $title ); ?>

		<figure class="figure">
			<?php
				printf(
					'<a class="link" href="%1$s" title="%2$s">%3$s</a>',
					esc_url( get_permalink() ),
					the_title_attribute( 'echo=0' ),
					the_post_thumbnail()
				);
			?>

			<?php
				the_title(
					sprintf(
						'<figcaption class="figcaption"><a class="link" href="%1$s" title="%2$s">',
						esc_url( get_permalink() ),
						the_title_attribute( 'echo=0' )
					),
					'</a></figcaption>'
				);
			?>
		</figure>
	</aside>
	<?php
}
?>
