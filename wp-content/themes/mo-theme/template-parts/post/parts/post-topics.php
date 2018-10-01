<?php
/**
 * Displays the post topics
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

$categories = get_the_term_list( $post->ID, 'category', '<div class="topic">', '</div><div class="topic">', '</div>' );
$tags       = get_the_term_list( $post->ID, 'post_tag', '<div class="topic">', '</div><div class="topic">', '</div>' );

$all = $categories . $tags;
echo wp_kses_post( $all );
