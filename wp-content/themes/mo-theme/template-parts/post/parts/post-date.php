<?php
/**
 * Displays the post date.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

?>

<aside class="post-date">
	<h3 class="hidden">Post date</h3>

	<div class="posted-on">
		<time class="date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
			<?php echo esc_html( get_the_date() ); ?>
		</time>
	</div>
</aside>
