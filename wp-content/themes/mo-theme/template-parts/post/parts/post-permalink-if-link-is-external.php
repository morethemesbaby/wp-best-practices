<?php
/**
 * Displays post permalink if the link points to an external link
 *
 * @package MoTheme
 * @since 1.0.0
 */

$mopost = new Mo_Theme_TemplateTags_Post();

if ( ! $mopost->link_is_external( $mopost->get_link_from_content() ) ) {
	get_template_part( 'template-parts/post/parts/post', 'permalink' );
}
