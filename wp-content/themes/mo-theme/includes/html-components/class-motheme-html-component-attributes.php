<?php
/**
 * The HTML component attributes class
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeHTMLComponentAttributes' ) ) {
	/**
	 * The HTML component attributes class.
	 *
	 * @since 1.0.0
	 */
	class MoThemeHTMLComponentAttributes extends MoThemeHTMLComponent {

		/**
		 * Class arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array $arguments An Array of arguments.
		 */
		public $arguments = array(
			'block'                   => '',
			'element'                 => '',
			'modifier'                => '',
			'display_class'           => true,
			'display_id'              => false,
			'display_data_attributes' => false,
			'class_tag'               => 'class',
			'id_tag'                  => 'id',
			'element_prefix'          => '-',
			'modifier_prefix'         => '--',
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
			$this->arguments = array_merge( $this->arguments, $arguments );
		}

		/**
		 * Displays the attributes of an element.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The class setup arguments array.
		 * @return void
		 */
		public function display( $arguments = array() ) {
			$this->arguments = array_merge( $this->arguments, $arguments );
			$this->classname = $this->create_classname();

			if ( '' === $this->classname ) {
				return;
			}

			if ( $this->arguments['display_class'] ) {
				$this->display_tag_with_attributes( 'class_tag' );
			}

			if ( $this->arguments['display_id'] ) {
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
			$block    = $this->arguments['block'];
			$element  = $this->arguments['element'];
			$modifier = $this->arguments['modifier'];

			if ( '' === $block ) {
				return '';
			}

			$classname = $this->convert_string_to_classname( $block );
			$ret       = [];

			if ( '' !== $element ) {
				$classname .= $this->arguments['element_prefix'];
				$classname .= $this->convert_string_to_classname( $element );
			}

			$ret[] = $classname;

			if ( '' !== $modifier ) {
				$classname .= $this->arguments['modifier_prefix'];
				$classname .= $this->convert_string_to_classname( $modifier );
				$ret[]      = $classname;
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
