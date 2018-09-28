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
		 * Class arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array $arguments An Array of arguments.
		 */
		public $arguments = array(
			'class_tag'       => 'class',
			'id_tag'          => 'id',
			'modifier_prefix' => '--',
		);


		/**
		 * The attributes of an HTML element
		 *
		 * @since 1.0.0
		 *
		 * @var array
		 */
		public $element_attributes = array(
			'name'                    => '',
			'modifier'                => '',
			'display_class'           => true,
			'display_id'              => false,
			'display_data_attributes' => false,
		);

		/**
		 * Theme variables.
		 *
		 * They are dynamically set and get (overloaded).
		 *
		 * @since 1.0.0
		 *
		 * @link http://codular.com/introducing-php-classes
		 * @var array $data An array of variables.
		 */
		private $data = array();


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
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The class setup arguments array.
		 * @return void
		 */
		public function __construct( $arguments = array() ) {
			$this->arguments = array_merge( $this->arguments, $arguments );
		}

		/**
		 * Displays the attributes of an element.
		 *
		 * @since 1.0.0
		 *
		 * @param array $element_attributes The element attributes descriptor.
		 * @return void
		 */
		public function display_attributes( $element_attributes ) {
			$this->element_attributes = array_merge( $this->element_attributes, $element_attributes );

			$this->classname = $this->create_classname();

			if ( $this->element_attributes['display_class'] ) {
				$this->display_tag_with_attributes( 'class_tag' );
			}

			if ( $this->element_attributes['display_id'] ) {
				$this->display_tag_with_attributes( 'id_tag' );
			}
		}

		/**
		 * Displays a tag with attributes.
		 *
		 * @since 1.0.0
		 *
		 * @param  string $tag The ID of the tag.
		 * @return void
		 */
		public function display_tag_with_attributes( $tag ) {
			echo esc_attr( $this->arguments[ $tag ] );
			echo '="';
			echo esc_attr( $this->classname );
			echo '"';
		}

		/**
		 * Creates a classname for an element.
		 *
		 * @since 1.0.0
		 *
		 * @return string [description]
		 */
		public function create_classname() {
			$classname = $this->convert_string_to_classname( $this->element_attributes['name'] );
			$modifier  = $this->element_attributes['modifier'];

			$ret   = [];
			$ret[] = $classname;

			if ( ! empty( $modifier ) ) {
				$ret[] = $classname . $this->arguments['modifier_prefix'] . $modifier;
			}

			return implode( ' ', $ret );
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
