<?php
/**
 * Displays the comment content or comment excerpt.
 *
 * If the comment is lengthier than 60 words the excerpt will be displayed.
 *
 * @package Log_Lolla_Pro_Theme
 * @since 1.0.0
 */

if ( log_lolla_theme_count_words( get_comment_text() ) > 60 ) {
	get_template_part( 'template-parts/comment/parts/comment', 'excerpt' );
} else {
	get_template_part( 'template-parts/comment/parts/comment', 'content' );
}
