<?php
/**
 * The Custom Post Types class
 *
 * @package MoPlugin
 * @since 1.0.0
 */

if ( ! class_exists( 'MoPluginCustomPostTypes' ) ) {
	/**
	 * The HTML components class.
	 *
	 * @since 1.0.0
	 */
	class MoPluginCustomPostTypes extends MoPluginBase {

		/**
		 * Class arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array $arguments An Array of arguments.
		 */
		public $arguments = array(
		);

		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The class setup arguments array.
		 * @return void
		 */
		public function __construct( $arguments = array() ) {
			$this->arguments = $this->array_merge( $this->arguments, $arguments );
		}

		/**
		 * Registers custom post types.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public static function register() {
			register_post_type( 'book' );
		}

		/**
		 * Deregisters custom post types.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public static function deregister() {
			unregister_post_type( 'book' );
		}
	}
} // End if().
