<?php
/**
 * Displays post permalink if the link points to an external link
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

$url = log_lolla_theme_get_post_link_from_content();

if ( ! log_lolla_theme_post_link_is_external( $url ) ) {
	get_template_part( 'template-parts/post/parts/post', 'permalink' );
}
