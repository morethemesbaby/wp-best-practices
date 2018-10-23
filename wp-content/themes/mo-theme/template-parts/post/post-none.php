<?php
/**
 * Displays a message that posts cannot be found.
 *
 * @package MoTheme
 * @since 1.0.0
 */

$component = new Mo_Theme_Components();

$attributes = apply_filters(
	'mo_theme_post_none_attributes',
	array(
		'block'        => 'page',
		'custom_class' => 'no-results not-found',
	)
);

$content_attributes = apply_filters(
	'mo_theme_post_none_content_attributes',
	array(
		'block'        => 'page',
		'modifier'     => 'content',
		'custom_class' => '',
	)
);

$title = apply_filters(
	'mo_theme_page_title',
	array(
		/* translators: The title of the section when no posts was found in the loop. */
		'title' => esc_html_x( 'Nothing Found', 'Nothing found', 'mo-theme' ),
		'class' => 'page-title',
	)
);

?>


<section <?php $component->attributes->display( $attributes ); ?>>
	<?php $component->title->display( $title ); ?>

	<div <?php $component->attributes->display( $content_attributes ); ?>>
		<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) {
				?>
				<p>
					<?php
						printf(
							wp_kses(
								/* translators: The text when no posts was found in the loop, and the user can publish posts. */
								__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'mo-theme' ),
								array(
									'a' => array(
										'href' => array(),
									),
								)
							),
							esc_url( admin_url( 'post-new.php' ) )
						);
					?>
				</p>
				<?php
			} elseif ( is_search() ) {
				?>
				<p>
					<?php
						/* translators: The text when no posts was found in a search. */
						esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'mo-theme' );
					?>
				</p>
				<?php get_search_form(); ?>
				<?php
			} else {
				?>
				<p>
					<?php
						/* translators: The text when no posts was found in the loop. */
						esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'mo-theme' );
					?>
				</p>
				<?php get_search_form(); ?>
				<?php
			} // End if().
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
