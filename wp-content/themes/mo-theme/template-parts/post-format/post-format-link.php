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
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

$component = new MoThemeHTMLComponent();

$attributes = apply_filters(
	'mo_theme_post_format_aside_attributes',
	array(
		'block'        => 'post',
		'custom_class' => 'post-format-aside',
		'custom_id'    => 'post-' . get_the_ID(),
	)
);

$url   = log_lolla_theme_get_post_link_from_content();
$klass = log_lolla_theme_get_post_format_link_class( $url );
$title = log_lolla_theme_get_post_format_link_title( $url );
$arrow = log_lolla_theme_get_arrow_html( 'right' );

$post_klass_array = array(
	'post',
	'post-with-sidebar',
	'post-format-link',
	$klass,
);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_klass_array ); ?>>
	<?php get_template_part( 'template-parts/post-sidebar/post-sidebar', 'left' ); ?>

	<div class="post-content-between-sidebars">
		<?php get_template_part( 'template-parts/post/parts/post', 'sticky' ); ?>

		<h3 class="post-title">
			<a class="link <?php echo esc_attr( $klass ); ?>" title="<?php echo esc_attr( $title ); ?>" href="<?php echo esc_url( $url ); ?>">
				<?php echo wp_kses_post( $title . $arrow ); ?>
			</a>
		</h3>

		<?php get_template_part( 'template-parts/post/parts/post', 'permalink-if-link-is-external' ); ?>
	</div>

	<?php get_template_part( 'template-parts/post-sidebar/post-sidebar', 'right' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
