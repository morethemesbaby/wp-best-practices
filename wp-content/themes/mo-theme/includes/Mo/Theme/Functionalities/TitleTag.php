<?php
/**
 * The WordPress Title Tag functionality
 *
 * @package Mo\Theme\Functionalities
 * @since 1.0.0
 */

if ( ! class_exists( 'Mo_Theme_Functionalities_TitleTag' ) ) {
	/**
	 * The WordPress Title Tag functionality class.
	 *
	 * Enables plugins and themes to manage the document title tag.
	 *
	 * @since 1.0.0
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
	 */
	class Mo_Theme_Functionalities_TitleTag {
		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			add_theme_support( 'title-tag' );
		}
	}
}
