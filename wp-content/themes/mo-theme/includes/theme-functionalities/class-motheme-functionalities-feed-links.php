<?php
/**
 * The WordPress Feed Links functionality
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeFunctionalitiesFeedLinks' ) ) {
	/**
	 * The WordPress Feed Links functionality class.
	 *
	 * Enables Automatic Feed Links for post and comment in the head.
	 *
	 * @since 1.0.0
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#feed-links
	 */
	class MoThemeFunctionalitiesFeedLinks {
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
