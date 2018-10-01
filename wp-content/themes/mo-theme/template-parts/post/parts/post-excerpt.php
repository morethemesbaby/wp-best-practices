<?php
/**
 * Displays the post excerpt.
 *
 * Only if the post has an excerpt defined, and we are on an archive page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

?>

<aside class="post-excerpt">
	<h3 class="hidden">Post excerpt</h3>

	<div class="text">
		<?php the_excerpt(); ?>
	</div>
</aside>
