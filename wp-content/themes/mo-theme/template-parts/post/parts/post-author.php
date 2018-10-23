<?php
/**
 * Displays the post author
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new Mo_Theme_Components();

$attributes = apply_filters(
	'mo_theme_post_author_attributes',
	array(
		'block'   => 'post',
		'element' => 'author',
	)
);

$title = apply_filters(
	'mo_theme_post_author_title',
	array(
		'title' => 'Post author',
	)
);
?>

<aside <?php $component->attributes->display( $attributes ); ?>>
	<?php $component->title->display( $title ); ?>

	<div class="posted-by">
		<?php
		/* translators: The `by` text before the post author. */
		echo esc_html_x( 'by', 'post author', 'mo-theme' );
		?>

		<span class="post-author-link">
			<?php
				printf(
					'<a class="link" href="%1$s" title="%2$s">%2$s</a>',
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_html( get_the_author() )
				);
			?>
		</span>
	</div>
</aside>
