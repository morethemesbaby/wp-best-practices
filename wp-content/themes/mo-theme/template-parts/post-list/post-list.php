<?php
/**
 * Displays a list of posts.
 *
 * Displays the standard query from the loop.
 *
 * @package MoTheme
 * @since 1.0.0
 */

$post_list_query_vars_defaults = array(
	'klass'       => '',
	'title'       => 'Post list',
	'posts'       => array(),
	'post-format' => '',
);

$post_list_query_vars = array_merge(
	$post_list_query_vars_defaults,
	get_query_var( 'post-list-query-vars' )
);

$post_list_klass       = $post_list_query_vars['klass'];
$post_list_title       = $post_list_query_vars['title'];
$post_list_posts       = $post_list_query_vars['posts'];
$post_list_post_format = $post_list_query_vars['post-format'];

$component = new MoThemeHTMLComponent();
?>

<section <?php $component->attributes->display( array( 'block' => 'Post list' ) ); ?>>
	<?php $component->title->display( array( 'title' => 'Post list' ) ); ?>

	<div <?php $component->attributes->display( array( 'block' => 'List items' ) ); ?>>
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
