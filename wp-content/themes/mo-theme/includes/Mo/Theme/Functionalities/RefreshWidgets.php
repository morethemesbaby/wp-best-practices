<?php
/**
 * The WordPress Refresh Widgets functionality
 *
 * @package Mo\Theme\Functionalities
 * @since 1.0.0
 */

if ( ! class_exists( 'Mo_Theme_Functionalities_RefreshWidgets' ) ) {
	/**
	 * The WordPress Refresh Widgets functionality class.
	 *
	 * Enables Selective Refresh for Widgets being managed within the Customizer.
	 *
	 * @since 1.0.0
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
	 */
	class Mo_Theme_Functionalities_RefreshWidgets {
		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			add_theme_support( 'customize-selective-refresh-widgets' );
		}
	}
}
