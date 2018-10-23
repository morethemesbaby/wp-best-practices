<?php
/**
 * Displays a list of posts.
 *
 * Displays the standard query from the loop.
 *
 * @package MoTheme
 * @since 1.0.0
 */

$mo = new Mo_Theme_Base();

$query_vars = $mo->get_query_var(
	array(
		'name'     => 'post-list-query-vars',
		'defaults' => array(
			'klass'       => '',
			'title'       => 'Post list',
			'post-format' => '',
			'query'       => null,
		),
	)
);

$component = new Mo_Theme_Components();

$attributes = apply_filters(
	'mo_theme_post_list_attributes',
	array(
		'block'        => 'post-list',
		'custom_class' => $query_vars['klass'],
	)
);

$title = apply_filters(
	'mo_theme_post_list_title',
	array(
		'title' => $query_vars['title'],
	)
);

$post_list_post_format = $query_vars['post-format'];
?>

<section <?php $component->attributes->display( $attributes ); ?>>
	<?php $component->title->display( $title ); ?>

	<div class="list-items">
		<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();

					if ( empty( $post_list_post_format ) ) {
						get_template_part( 'template-parts/post-format/post-format', get_post_format() );
					} else {
						get_template_part( 'template-parts/post-format/post-format', $post_list_post_format );
					}
				}

				get_template_part( 'template-parts/navigation/navigation', 'for-posts' );

			} else {
				get_template_part( 'template-parts/post/post', 'none' );
			}
		?>
	</div>
</section>
