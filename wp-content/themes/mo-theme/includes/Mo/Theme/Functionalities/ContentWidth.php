<?php
/**
 * The WordPress.org Content Width functionality
 *
 * @package Mo\Theme\Functionalities
 * @since 1.0.0
 */

if ( ! class_exists( 'Mo_Theme_Functionalities_ContentWidth' ) ) {
	/**
	 * The WordPress.org Content Width functionality class.
	 *
	 * Sets the maximum allowed width for any content in the theme, like oEmbeds and images added to posts.
	 * Required by the Theme Check plugin.
	 *
	 * @link https://make.wordpress.org/themes/handbook/review/required/theme-check-plugin/
	 *
	 * @since 1.0.0
	 */
	class Mo_Theme_Functionalities_ContentWidth {
		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			$GLOBALS['content_width'] = apply_filters( 'mo_theme_content_width', 640 );
		}
	}
}
