<?php
/**
 * Displays navigation links (next post, previous post) inside a post.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

$arrow_left  = log_lolla_theme_get_arrow_html( 'left' );
$arrow_right = log_lolla_theme_get_arrow_html( 'right' );

$prev = get_previous_post_link("$arrow_left%link");
$next = get_next_post_link("$arrow_right%link");

if ( ! empty( $prev ) || ! empty( $next ) ) {
	?>
	<nav class="navigation navigation-for-post">
		<h3 class="hidden">Post navigation</h3>

		<ul class="ul">
			<?php
			if ( ! empty( $prev ) ) {
				?>
				<li class="li">
					<?php echo wp_kses_post( $prev ); ?>
				</li>
				<?php
			}

			if ( ! empty( $next ) ) {
				?>
				<li class="li">
					<?php echo wp_kses_post( $next ); ?>
				</li>
				<?php
			}
			?>
		</ul>
	</nav>
	<?php
}
