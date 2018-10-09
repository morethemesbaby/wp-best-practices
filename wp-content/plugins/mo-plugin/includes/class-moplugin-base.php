<?php
/**
 * The MoPlugin base class
 *
 * @package MoPlugin
 * @since 1.0.0
 */

if ( ! class_exists( 'MoPluginBase' ) ) {
	/**
	 * The base class.
	 *
	 * @since 1.0.0
	 */
	class MoPluginBase {
		/**
		 * Class variables.
		 *
		 * They are dynamically set and get (overloaded).
		 *
		 * @since 1.0.0
		 *
		 * @link http://codular.com/introducing-php-classes
		 * @var array $data An array of variables.
		 */
		protected $data = array();

		/**
		 * Dynamically sets a variable.
		 *
		 * @since 1.0.0
		 *
		 * @param string $variable The variable name.
		 * @param mixed  $value    The variable value.
		 * @return void
		 */
		public function __set( $variable, $value ) {
			$this->data[ $variable ] = $value;
		}


		/**
		 * Dynamically gets a variable.
		 *
		 * @since 1.0.0
		 *
		 * @param string $variable The variable name.
		 * @return mixed           The variable value.
		 */
		public function __get( $variable ) {
			if ( isset( $this->data[ $variable ] ) ) {
				return $this->data[ $variable ];
			} else {
				die( 'Unknown variable: ' . esc_attr( $variable ) );
			}
		}

		/**
		 * Merges two arrays.
		 *
		 * The PHP `array_merge()` gives a warning when the second argument is not an array.
		 *
		 * @since 1.0.0
		 *
		 * @param array $array1 The first array.
		 * @param array $array2 The second array.
		 *
		 * @return array
		 */
		public function array_merge( $array1 = array(), $array2 = array() ) {
			return array_merge( (array) $array1, (array) $array2 );
		}
	}
} // End if().
