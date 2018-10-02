<?php
/**
 * The HTML component attributes class
 * 
 * Create attribute-value pairs for HTML elements.
 * Example: <element attribute="value">
 * Or more precisely:
 *  <element id="post-1" class="block-element--modifier customclass" data-parent="post" data-index-number="1">
 * 
 * 
 * @link https://en.wikipedia.org/wiki/HTML_attribute
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
		 * Used to setup the class.
		 *
		 * @since 1.0.0
		 *
		 * @var array An array of arguments.
		 */
		public $arguments = array(
			'block'                   => '',
			'element'                 => '',
			'modifier'                => '',
			'custom_class'            => '',
			'custom_id'               => '',
			'display_class'           => true,
			'display_id'              => false,
			'display_data_attributes' => false,
			'class_tag'               => 'class',
			'id_tag'                  => 'id',
			'data_tag'                => 'data',
			'data_prefix'             => '-',
			'element_prefix'          => '-',
			'modifier_prefix'         => '--',
		);

		/**
		 * The arguments of an attribute.
		 *
		 * @since 1.0.0
		 *
		 * @var array An array of arguments
		 */
		public $attribute_arguments = array(
			'custom_attribute' => '',
			'attribute_tag'    => '',
		);

		/**
		 * The arguments of an attribute with values.
		 *
		 * @since 1.0.0
		 *
		 * @var array An array of arguments.
		 */
		public $attribute_with_values_arguments = array(
			'attribute' => '',
			'values'    => '',
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
		 * Displays all the attribute-value pairs of an element.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The arguments array.
		 * @return void
		 */
		public function display( $arguments = array() ) {
			$this->arguments = array_merge( $this->arguments, $arguments );

			$this->display_id();
			$this->display_class();
			$this->display_data_attributes();
		}

		/**
		 * Returns all the attribute-value pairs of an element.
		 * 
		 * @since 1.0.0
		 *
		 * @param array $arguments The arguments array.
		 * @return string
		 */
		public function get( $arguments = array() ) {
			$this->arguments = array_merge( $this->arguments, $arguments );

			return implode(
				' ',
				array(
					$this->get_id(),
					$this->get_class(),
					$this->get_data_attributes(),
				)
			);
		}

		/**
		 * Return the 'id' attribute-value pair of an element.
		 * 
		 * @since 1.0.0
		 * 
		 * @return string
		 */
		public function get_id() {

		}


		/**
		 * Gets an attribute with values.
		 * 
		 * This function is almost identic to @see MoThemeHTMLAttributes::display_attribute_with_values()
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The arguments array.
		 * @return string
		 */
		public function get_attribute_with_values( $arguments = array() ) {
			$arguments = array_merge( $this->attribute_with_values_arguments, $arguments );

			if ( ( '' === $arguments['attribute'] ) || ( '' === $arguments['values'] ) ) {
				return;
			}

			return sprintf(
				'%1$s="%2$s"',
				esc_attr( $arguments['attribute'] ),
				esc_attr( $arguments['values'] )
			);
		}


		/**
		 * Displays an attribute with values.
		 * 
		 * This function is almost identic to @see MoThemeHTMLAttributes::get_attribute_with_values()
		 * Because of `esc_attr()` we can't do `echo MoThemeHTMLAttributes::get_attribute_with_values()`
		 * `esc_attr()` is needed for this usage scenario: `<div <?php $component->attributes->display( ... ) ?>>
		 * No `sprintf` or `wp_kses` can be used here instead of `esc_attr`
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The arguments array.
		 * @return void
		 */
		public function display_attribute_with_values( $arguments = array() ) {
			$arguments = array_merge( $this->attribute_with_values_arguments, $arguments );

			if ( ( '' === $arguments['attribute'] ) || ( '' === $arguments['values'] ) ) {
				return;
			}

			echo esc_attr( $arguments['attribute'] );
			echo '="';
			echo esc_attr( $arguments['values'] );
			echo '"';
		}

		
		/**
		 * Creates a BEM selector.
		 *
		 * @since 1.0.0
		 *
		 * @return string [description]
		 */
		public function create_bem_selector() {
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
