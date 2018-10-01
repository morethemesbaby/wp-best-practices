<?php
/**
 * Displays the post date, author, categories and tags
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

?>

<aside class="post-footer">
	<h3 class="hidden">Post footer</h3>

	<div class="list">
		<?php get_template_part( 'template-parts/post/parts/post', 'topics' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'date' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'author' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'edit-link' ); ?>
	</div>
</aside>
