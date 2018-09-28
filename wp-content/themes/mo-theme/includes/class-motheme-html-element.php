<?php
/**
 * The HTML elements class
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeHTMLElement' ) ) {
	/**
	 * The HTML elements class.
	 *
	 * @since 1.0.0
	 */
	class MoThemeHTMLElement {

		/**
		 * The attributes of an HTML element
		 *
		 * @since 1.0.0
		 *
		 * @var array
		 */
		public $element_attributes = array(
			'name'                    => '',
			'display_class'           => true,
			'display_id'              => false,
			'display_data_attributes' => false,
		);

		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			//
		}

		/**
		 * Displays the attributes of an element.
		 *
		 * @since 1.0.0
		 *
		 * @param array $element_attributes The element attributes descriptor.
		 * @return string
		 */
		public function display_attributes( $element_attributes ) {
			$this->element_attributes = array_merge( $this->element_attributes, $element_attributes );

			$ret = [];

			if ( $this->element_attributes['display_class'] ) {
				$ret[] = "class={$this->create_classname()}";
			}

			return implode( ' ', $ret );
		}

		/**
		 * Creates a classname for an element.
		 *
		 * @since 1.0.0
		 *
		 * @return string [description]
		 */
		public function create_classname() {
			return $this->convert_string_to_classname( $this->element_attributes['name'] );
		}

		/**
		 * Converts a string to classname.
		 *
		 * @since 1.0.0
		 *
		 * @param  string $string A string.
		 * @return string         The string converted to a classname.
		 */
		public function convert_string_to_classname( $string ) {
			$a = preg_replace( '/([^a-z0-9]+)/i', '-', $string );
			$b = preg_replace( '/ /', '-', $a );

			$ret = strtolower( $b );

			return $ret;
		}
	}
}
