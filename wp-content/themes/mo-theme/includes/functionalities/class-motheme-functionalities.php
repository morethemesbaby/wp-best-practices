<?php
/**
 * The WordPress standard functionalities setup class
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeFunctionalities' ) ) {
	/**
	 * The main functionalities class
	 *
	 * @package MoTheme
	 * @since 1.0.0
	 */
	class MoThemeFunctionalities {
		/**
		 * Sets up the class
		 *
		 * @param $arguments An array of arguments
		 * @return void
		 */
		function __construct($arguments) {
			print_r($arguments);
		}
	}
}
