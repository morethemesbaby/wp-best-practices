<?php
/**
 * The Arrows HTML component
 *
 * @package Mo\Theme\Components
 * @since 1.0.0
 */

if ( ! class_exists( 'Mo_Theme_Components_Arrows' ) ) {
	/**
	 * The Arrows HTML component class.
	 *
	 * Adds one or more arrow to a HTML element.
	 * Arrows are one of the design landmarks of the site.
	 *
	 * @since 1.0.0
	 */
	class Mo_Theme_Components_Arrows extends Mo_Theme_Base {

		/**
		 * Class arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array $arguments An Array of arguments.
		 */
		public $arguments = array(
			'number'    => 1,
			'direction' => 'top',
		);

		/**
		 * HTML tags and attributes allowed for arrows.
		 *
		 * @var array
		 */
		public $wp_kses_for_arrow = array(
			'span' => array(
				'class' => array(),
			),
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
		 * Displays the arrows.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The class setup arguments array.
		 * @return void
		 */
		public function display( $arguments = array() ) {
			$this->arguments = $this->array_merge( $this->arguments, $arguments );

			$this->arguments['display'] = true;

			$this->display_or_get();
		}

		/**
		 * Returns the arrows.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The class setup arguments array.
		 * @return string
		 */
		public function get( $arguments = array() ) {
			$this->arguments = $this->array_merge( $this->arguments, $arguments );

			$this->arguments['display'] = false;

			return $this->display_or_get();
		}

		/**
		 * Displays or returns the arrows.
		 *
		 * @since 1.0.0
		 *
		 * @return void|string Void if the arrows are displayed, otherwise the arrows.
		 */
		public function display_or_get() {
			$arguments = array(
				'query_var_name'     => 'arrow_with_triangle_query_vars',
				'query_var_value'    => $this->arguments,
				'template_part_slug' => 'template-parts/html-components/arrow-with-triangle/arrow-with-triangle',
				'template_part_name' => '',
			);

			$ret = '';

			for ( $i = 0;  $i < $this->arguments['number'];  $i++ ) {
				if ( true === $this->arguments['display'] ) {
					echo wp_kses(
						$this->get_template_part( $arguments ),
						$this->wp_kses_for_arrow
					);
				} else {
					$ret .= $this->get_template_part( $arguments );
				}
			}

			return $ret;
		}
	}
} // End if().
