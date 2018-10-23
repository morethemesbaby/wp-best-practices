<?php
/**
 * The WordPress Feed Links functionality
 *
 * @package Mo\Theme\Functionalities
 * @since 1.0.0
 */

if ( ! class_exists( 'Mo_Theme_Functionalities_FeedLinks' ) ) {
	/**
	 * The WordPress Feed Links functionality class.
	 *
	 * Enables Automatic Feed Links for post and comment in the head.
	 *
	 * @since 1.0.0
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#feed-links
	 */
	class Mo_Theme_Functionalities_FeedLinks {
		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			add_theme_support( 'automatic-feed-links' );
		}
	}
}
