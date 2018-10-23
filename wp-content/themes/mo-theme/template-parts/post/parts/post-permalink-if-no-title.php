<?php
/**
 * Displays the post permalink if there is no post title
 *
 * @package MoTheme
 * @since 1.0.0
 */

$mopost = new Mo_Theme_TemplateTags_Post();

if ( ! $mopost->has_title() ) {
	get_template_part( 'template-parts/post/parts/post', 'permalink' );
}
