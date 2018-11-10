<?php
/**
 * The More Themes Baby WordPress base
 *
 * @package Mo
 * @since 1.0.0
 */

if ( ! class_exists( 'Mo_Base' ) ) {
	/**
	 * The More Themes Baby WordPress base class.
	 *
	 * Contains code reused by both themes and plugins.
	 *
	 * @since 1.0.0
	 */
	class Mo_Base {
		/**
		 * Class variables.
		 *
		 * They are dynamically set and get - overloaded - with magic methods.
		 * This makes all the classes depending on this base class open for extension.
		 *
		 * @since 1.0.0
		 *
		 * @link http://codular.com/introducing-php-classes Magic Methods.
		 * @link https://alistapart.com/article/coding-with-clarity-part-ii#section3 The open/closed principle.
		 *
		 * @var array An array of variables.
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
		 * If a variable doesn't exists halts the code execution.
		 *
		 * @todo This risk might be mitigated better in future versions.
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
				wp_die( 'Unknown variable: ' . esc_attr( $variable ) );
			}
		}

		/**
		 * Dynamically checks if a variable exists.
		 *
		 * @since 1.0.0
		 *
		 * @param string $variable The variable name.
		 * @return bool
		 */
		public function __isset( $variable ) {
			return array_key_exists( $variable, $this->data );
		}

		/**
		 * Removes non standard characters from string.
		 *
		 * @since 1.1.0
		 *
		 * @param string $string The string to humanize.
		 * @return string
		 */
		public function humanize_string( $string ) {
			$str = str_replace( '_', ' ', $string );
			$str = str_replace( '-', ' ', $string );
			$str = ucfirst( $str );

			return $str;
		}

		/**
		 * Merges two arrays.
		 *
		 * The PHP `array_merge()` gives a warning when the second argument is not an array.
		 * This method eliminates the warning.
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

		/**
		 * The PHP `implode()` function glues together the pieces even if they are empty.
		 * This method filters out empty pieces.
		 *
		 * Example:
		 * - PHP's default `implode( '/', array( 'folder', '', '' ) )` will return `folder///`.
		 * - This method returns just `folder/`.
		 *
		 * @since 1.0.0
		 *
		 * @param string $glue   The glue string.
		 * @param array  $pieces The array of strings to be glued together.
		 *
		 * @return string
		 */
		public function implode( $glue, $pieces ) {
			return implode( $glue, array_filter( $pieces ) );
		}

		/**
		 * Returns the first word in a sentence.
		 *
		 * @since 1.0.0
		 *
		 * @param string $sentence The sentence.
		 *
		 * @return string The first word, or the entire sentence.
		 */
		public function get_first_word_from_sentence( $sentence ) {
			$parts = explode( ' ', $sentence );
			return ( isset( $parts[0] ) ) ? $parts[0] : $sentence;
		}
	}
} // End if().
