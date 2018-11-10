<?php
/**
 * The Admin Settings API
 *
 * @link https://developer.wordpress.org/plugins/settings/
 *
 * @package Mo\Plugin\Admin
 * @since 1.1.0
 */

if ( ! class_exists( 'Mo_Plugin_Admin_Settings' ) ) {
	/**
	 * The Admin Settings API class.
	 *
	 * Displays and manages settings in the admin area.
	 *
	 * @since 1.0.0
	 */
	class Mo_Plugin_Admin_Settings extends Mo_Base {

		/**
		 * Class arguments.
		 *
		 * @since 1.1.0
		 *
		 * @var array $arguments An Array of arguments.
		 */
		public $arguments = array(
		);

		/**
		 * Sets up the class.
		 *
		 * @since 1.1.0
		 *
		 * @param array $arguments The class setup arguments array.
		 * @return void
		 */
		public function __construct( $arguments = array() ) {
			$this->arguments = $this->array_merge( $this->arguments, $arguments );
			$this->setup_arguments();
		}

		/**
		 * Sets up arguments.
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function setup_arguments() {
			//
		}
	}
} // End if().
