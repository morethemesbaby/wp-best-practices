<?php
/**
 * The WordPress post formats functionality
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeFunctionalitiesPostFormats' ) ) {
	/**
	 * The post format functionality class
	 */
	class MoThemeFunctionalitiesPostFormats {
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
