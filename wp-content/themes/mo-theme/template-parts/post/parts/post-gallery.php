<?php
/**
 * Displays a post gallery
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Theme
 * @since 1.0.0
 */

?>

<aside class="post-gallery">
	<h3 class="hidden">Post gallery</h3>

	<?php
	if ( get_post_gallery() ) :
		echo wp_kses_post( get_post_gallery() );
	endif;
	?>
</aside>
