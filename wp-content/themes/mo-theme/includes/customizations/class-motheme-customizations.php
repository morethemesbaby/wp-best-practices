<?php
/**
 * The WordPress standard customizations setup class
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeCustomizations' ) ) {
	/**
	 * The main customizations class
	 *
	 * @package MoTheme
	 * @since 1.0.0
	 */
	class MoThemeCustomizations {
		/**
		 * Sets up the class
		 *
		 * @param $arguments An array of arguments
		 * @return void
		 */
		function __construct( $arguments ) {
			print_r($arguments);
		}
	}
}
