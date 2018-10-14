<?php
/**
 * The WordPress.org Comment Scripts functionality.
 *
 * Includes scripts to handle commenting on posts.
 * Required by the Theme Check plugin.
 *
 * @link https://make.wordpress.org/themes/handbook/review/required/theme-check-plugin/
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeFunctionalitiesCommentScripts' ) ) {
	/**
	 * The main class.
	 *
	 * @since 1.0.0
	 */
	class MoThemeFunctionalitiesCommentScripts {
		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'add_scripts' ) );
		}

		/**
		 * Adds comment scripts.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function add_scripts() {
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}
	}
}
