<?php
/**
 * The WordPress Post Thumbnails functionality
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeFunctionalitiesPostThumbnails' ) ) {
	/**
	 * The WordPress Post Thumbnails functionality class.
	 *
	 * Enables support for Post Thumbnails on posts, pages and custom post types.
	 *
	 * @since 1.0.0
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#post-thumbnails
	 */
	class MoThemeFunctionalitiesPostThumbnails {
		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			add_theme_support( 'post-thumbnails' );
		}
	}
}
