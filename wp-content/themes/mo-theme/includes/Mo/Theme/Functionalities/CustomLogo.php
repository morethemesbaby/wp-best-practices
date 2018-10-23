<?php
/**
 * The WordPress Custom Logo functionality
 *
 * @package Mo\Theme\Functionalities
 * @since 1.0.0
 */

if ( ! class_exists( 'Mo_Theme_Functionalities_CustomLogo' ) ) {
	/**
	 * The WordPress Custom Logo functionality class
	 *
	 * Adds custom logo support.
	 *
	 * @since 1.0.0
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#custom-logo
	 */
	class Mo_Theme_Functionalities_CustomLogo {
		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			add_theme_support(
				'custom-logo',
				apply_filters( 'mo_theme_custom_logo',
					array(
						'height'      => 250,
						'width'       => 250,
						'flex-width'  => true,
						'flex-height' => true,
					)
				)
			);
		}
	}
}
