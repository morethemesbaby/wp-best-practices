<?php
/**
 * Displays navigation links (next post, previous post) inside a post.
 *
 * @link https://developer.wordpress.org/themes/functionality/pagination/
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new Mo_Theme_Components();

$attributes = apply_filters(
	'mo_theme_navigation_for_post_attributes',
	array(
		'block'        => 'navigation',
		'custom_class' => 'navigation-for-post',
	)
);

$title = apply_filters(
	'mo_theme_navigation_for_post_title',
	array(
		'title' => 'Navigation for post',
	)
);

$arrow_left_attributes = apply_filters(
	'mo_theme_navigation_for_post_arrow_left_attributes',
	array(
		'number'    => 1,
		'direction' => 'left',
	)
);

$arrow_right_attributes = apply_filters(
	'mo_theme_navigation_for_post_arrow_right_attributes',
	array(
		'number'    => 1,
		'direction' => 'right',
	)
);

$arrow_left  = $component->arrows->get( $arrow_left_attributes );
$arrow_right = $component->arrows->get( $arrow_right_attributes );

$prev = get_previous_post_link( "$arrow_left%link" );
$next = get_next_post_link( "$arrow_right%link" );

if ( ! empty( $prev ) || ! empty( $next ) ) {
	?>
	<nav <?php $component->attributes->display( $attributes ); ?>>
		<?php $component->title->display( $title ); ?>

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
