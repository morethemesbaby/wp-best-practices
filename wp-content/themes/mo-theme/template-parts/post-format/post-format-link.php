<?php
/**
 * Displays a Link post
 *
 * Themes may wish to use the first <a href=””> tag in the post content as the external link for that post.
 * An alternative approach could be if the post consists only of a URL,
 * then that will be the URL and the title (post_title) will be the name attached to the anchor for it.
 *
 * When the link points to another WordPress site it is transformed to a widget by WordPress.
 * Example: https://css-tricks.com/accessibility-testing-tools/
 *
 * @link https://developer.wordpress.org/themes/functionality/post-formats/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component    = new MoThemeHTMLComponent();
$mopost       = new MoThemePost();
$mopostformat = new MoThemePostFormat();

$url   = $mopost->get_link_from_content();
$klass = $mopostformat->get_link_class( $url );
$title = $mopostformat->get_link_title( $url );

$attributes = apply_filters(
	'mo_theme_post_format_link_attributes',
	array(
		'block'        => 'post-format-link',
		'custom_class' => $klass,
		'custom_id'    => 'post-' . get_the_ID(),
	)
);

$post_title_arguments = array(
	'link_class' => "link ${klass}",
	'link_url'   => $url,
	'link_title' => $title,
);

add_filter( 'the_title', array( $mopostformat, 'add_arrow_to_link_post_title' ), 10, 2 );
?>

<article <?php $component->attributes->display( $attributes ); ?>>
	<?php do_action( 'mo_theme_before_post_format_link' ); ?>

	<?php get_template_part( 'template-parts/post/parts/post', 'sticky' ); ?>

	<?php
		set_query_var( 'post-title-query-vars', $post_title_arguments );
		get_template_part( 'template-parts/post/parts/post', 'title' );
	?>

	<?php get_template_part( 'template-parts/post/parts/post', 'permalink-if-link-is-external' ); ?>

	<?php do_action( 'mo_theme_after_post_format_link' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
