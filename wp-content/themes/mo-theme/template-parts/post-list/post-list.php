<?php
/**
 * Displays a list of posts.
 *
 * Displays the standard query from the loop.
 *
 * @package MoTheme
 * @since 1.0.0
 */

$mo         = new MoThemeBase();
$query_vars = $mo->get_query_var(
	array(
		'name'     => 'post-list-query-vars',
		'defaults' => array(
			'klass'       => '',
			'title'       => 'Post list',
			'post-format' => '',
		),
	)
);

$post_list_post_format = $query_vars['post-format'];

$component          = new MoThemeHTMLComponent();
$section_attributes = array(
	'block'        => 'post-list',
	'custom_class' => $query_vars['klass'],
);
$section_title      = array(
	'title' => $query_vars['title'],
);
?>

<section <?php apply_filters( 'mo_theme_post_list_attributes', $component->attributes->display( $section_attributes ) ); ?>>
	<?php apply_filters( 'mo_theme_post_list_title', $component->title->display( $section_title ) ); ?>

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
