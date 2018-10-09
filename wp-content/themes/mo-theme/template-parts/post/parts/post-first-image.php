<?php
/**
 * Displays the first image from the post content.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new MoThemeHTMLComponent();
$mopost    = new MoThemePost();

$attributes = apply_filters(
	'mo_theme_post_first_image_attributes',
	array(
		'block'    => 'post',
		'element'  => 'first-image',
	)
);

$title = apply_filters(
	'mo_theme_post_first_image_title',
	array(
		'title' => 'Post first image',
	)
);
?>

<aside <?php $component->attributes->display( $attributes ); ?>>
	<?php $component->title->display( $title ); ?>

	<figure class="figure">
		<?php
			echo sprintf(
				'<a class="link" href="%1$s" title="%2$s"><img src="%3$s" alt="%2$s"></a>',
				esc_url( get_permalink() ),
				the_title_attribute( 'echo=0' ),
				esc_url( $mopost->get_first_image_url() )
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
