<?php
/**
 * The WordPress Post Formats functionality
 *
 * @package Mo\Theme\Functionalities
 * @since 1.0.0
 */

if ( ! class_exists( 'Mo_Theme_Functionalities_PostFormats' ) ) {
	/**
	 * The WordPress Post Formats functionality class.
	 *
	 * Adds various kinds of post formats like links, quotes, image galleries and so.
	 *
	 * @since 1.0.0
	 *
	 * @link https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	class Mo_Theme_Functionalities_PostFormats {
		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			add_theme_support(
				'post-formats',
				apply_filters( 'mo_theme_supported_post_formats',
					array(
						'aside',
						'image',
						'video',
						'quote',
						'link',
						'gallery',
						'status',
						'audio',
						'chat',
					)
				)
			);
		}
	}
}
