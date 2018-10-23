<?php
/**
 * The Attributes HTML component
 *
 * @package Mo\Theme\Components
 * @since 1.0.0
 */

if ( ! class_exists( 'Mo_Theme_Components_Attributes' ) ) {
	/**
	 * The Attributes HTML component class.
	 *
	 * Creates attribute-value pairs for HTML elements.
	 *
	 * Example: <element attribute="value">
	 *
	 * Or more precisely:
	 *  <element id="post-1" class="block-element--modifier customclass" data-parent="post" data-index-number="1">
	 *
	 * @link https://en.wikipedia.org/wiki/HTML_attribute
	 *
	 * @since 1.0.0
	 */
	class Mo_Theme_Components_Attributes extends Mo_Theme_Components {

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
			$this->arguments = $this->array_merge( $this->arguments, $arguments );
		}

		/**
		 * Displays all the attribute-value pairs of an element.
		 *
		 * Usage: `<div <?php $component->attributes->display( ... ) ?>>
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The arguments array.
		 * @return void
		 */
		public function display( $arguments = array() ) {
			$this->arguments            = $this->array_merge( $this->arguments, $arguments );
			$this->arguments['display'] = true;

			$this->display_or_get( $this->create_id() );
			echo ' ';
			$this->display_or_get( $this->create_class() );
		}

		/**
		 * Returns all the attribute-value pairs of an element.
		 *
		 * Usage: `printf( '<div %s>', $component->attributes->get( ... ) )`;
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The arguments array.
		 * @return string
		 */
		public function get( $arguments = array() ) {
			$this->arguments            = $this->array_merge( $this->arguments, $arguments );
			$this->arguments['display'] = false;

			return $this->implode(
				' ',
				array(
					$this->display_or_get( $this->create_id() ),
					$this->display_or_get( $this->create_class() ),
				)
			);
		}

		/**
		 * Displays or returns an attribute-value pair of an element.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments An array of attribute and values pair.
		 * @return void|string Void if displayed, otherwise the argument-value string.
		 */
		public function display_or_get( $arguments ) {
			if ( true === $this->arguments['display'] ) {
				$this->display_attribute_with_values( $arguments );
			} else {
				return $this->get_attribute_with_values( $arguments );
			}
		}

		/**
		 * Creates the `class` attribute-value pair of an element.
		 *
		 * If the `custom_class` is set it will be added to the class list.
		 * If the `display_class` is set true a classname will be generated from other arguments.
		 *
		 * @since 1.0.0
		 *
		 * @return array An array of attribute and values pair
		 */
		public function create_class() {
			$values = array();

			if ( true === $this->arguments['display_class'] ) {
				$values[] = $this->create_bem_selector();
			}

			if ( '' !== $this->arguments['custom_class'] ) {
				$values[] = $this->arguments['custom_class'];
			}

			return array(
				'attribute' => $this->arguments['class_tag'],
				'values'    => implode( ' ', array_filter( $values ) ),
			);
		}

		/**
		 * Creates the 'id' attribute-value pair of an element.
		 *
		 * There can be a single value for the id attribute.
		 * `id="post-1"` is correct while `id="post-1 article-1"` is incorrect
		 *
		 * If the `custom_id` argument is set it will be returned as the `id` value.
		 * Otherwise an id value will be assembled based on the arguments given.
		 * And it will be returned if the `display_id` argument is set true.
		 *
		 * @since 1.0.0
		 *
		 * @return array An array of attribute and values pair.
		 */
		public function create_id() {
			$value = '';

			if ( '' !== $this->arguments['custom_id'] ) {
				$value = $this->arguments['custom_id'];
			} else {
				if ( true === $this->arguments['display_id'] ) {
					$value = $this->create_bem_selector();

					/**
					 * Return only single value for id.
					 *
					 * @link https://github.com/morethemesbaby/wp-best-practices/issues/1
					 */
					$value = $this->get_first_word_from_sentence( $value );
				}
			}

			return array(
				'attribute' => $this->arguments['id_tag'],
				'values'    => $value,
			);
		}


		/**
		 * Gets an attribute with values.
		 *
		 * This function is almost the same like @see MoThemeHTMLAttributes::display_attribute_with_values()
		 * See explanation there.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The arguments array.
		 * @return string
		 */
		public function get_attribute_with_values( $arguments = array() ) {
			$arguments = $this->array_merge( $this->attribute_with_values_arguments, $arguments );

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
		 * This function is almost the same like @see MoThemeHTMLAttributes::get_attribute_with_values()
		 * Because of output escaping we can't do `echo get_attribute_with_values()`.
		 * We need to do `echo esc_attr( get_attribute_with_values() );` which breaks the correct output into something like `<div class="" attribute="" ...`
		 * We have no other choice than displaying directly the escaped attributes here.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The arguments array.
		 * @return void
		 */
		public function display_attribute_with_values( $arguments = array() ) {
			$arguments = $this->array_merge( $this->attribute_with_values_arguments, $arguments );

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
			$ret       = array();

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
} // End if().
