<?php
/**
 * The WordPress Custom Logo functionality
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeFunctionalitiesCustomLogo' ) ) {
	/**
	 * The WordPress Custom Logo functionality class
	 *
	 * Adds custom logo support.
	 *
	 * @since 1.0.0
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#custom-logo
	 */
	class MoThemeFunctionalitiesCustomLogo {
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
