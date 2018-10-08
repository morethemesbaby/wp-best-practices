<?php
/**
 * The WordPress Comment Scripts functionality
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeFunctionalitiesCommentScripts' ) ) {
	/**
	 * The WordPress Comment Scripts functionality class.
	 *
	 * Includes scripts to handle commenting on posts.
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
