<?php
/**
 * The WordPress.org Custom Background functionality.
 *
 * Adds theme background color and image support.
 *
 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#custom-background
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeFunctionalitiesCustomBackground' ) ) {
	/**
	 * The main class.
	 *
	 * @since 1.0.0
	 */
	class MoThemeFunctionalitiesCustomBackground {
		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			$args = apply_filters( 'mo_theme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			);

			add_theme_support( 'custom-background', $args );
		}
	}
}
