<?php
/**
 * Displays post date and time.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

?>

<aside class="post-date-and-time">
	<h3 class="hidden">Post date and time</h3>

	<div class="posted-on">
		<time class="date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) . ', ' . get_the_time( 'c' ) ); ?>">
			<?php echo esc_html( get_the_date() . ', ' . get_the_time() ); ?>
		</time>
	</div>
</aside>
