<?php
/**
 * Displays the post permalink.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

?>

<aside class="post-permalink">
	<h3 class="hidden">Post permalink</h3>

	<div class="permalink">
		<a class="link" href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute( 'echo=0' ); ?>">
		<?php /* translators: %s: post permalink. */ ?>
		<?php echo esc_html_x( '&infin;', 'post permalink', 'log-lolla-theme' ); ?>
		</a>
	</div>
</aside>
