<?php
/**
 * The Custom Shortcode class
 *
 * @package MoPlugin
 * @since 1.0.0
 */

if ( ! class_exists( 'MoPluginCustomShortcode' ) ) {
	/**
	 * The Custom Shortcode class.
	 *
	 * @since 1.0.0
	 */
	class MoPluginCustomShortcode extends MoPluginBase {

		/**
		 * Class arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array $arguments An Array of arguments.
		 */
		public $arguments = array();

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
		 * Returns content for the shortcode.
		 *
		 * @since 1.0.0
		 *
		 * @link https://codex.wordpress.org/Function_Reference/add_shortcode
		 * @return string.
		 */
		public static function motag() {
			return '';
		}
	}
} // End if().
