<?php
/**
 * Displays the post permalink if there is no post title
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

$mopost = new MoThemePost();

if ( ! $mopost->has_title() ) {
	get_template_part( 'template-parts/post/parts/post', 'permalink' );
}
