<?php
/**
 * The HTML component title class
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeHTMLComponentTitle' ) ) {
	/**
	 * The HTML component title class.
	 *
	 * @since 1.0.0
	 */
	class MoThemeHTMLComponentTitle extends MoThemeHTMLComponent {

		/**
		 * Class arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array $arguments An Array of arguments.
		 */
		public $arguments = array(
			'title' => '',
			'class' => 'hidden',
		);

		/**
		 * HTML tags and attributes allowed for component title.
		 *
		 * @var array
		 */
		public $wp_kses_for_title = array(
			'h3' => array(
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
			$this->arguments = array_merge( $this->arguments, $arguments );
		}

		/**
		 * Displays the title of an element.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The class setup arguments array.
		 * @return void
		 */
		public function display( $arguments = array() ) {
			$this->arguments = array_merge( $this->arguments, $arguments );

			$arguments = array(
				'query_var_name'     => 'component-title-query-vars',
				'query_var_value'    => $this->arguments,
				'template_part_slug' => 'template-parts/framework/structure/component/parts/component-title',
				'template_part_name' => '',
			);

			echo wp_kses(
				$this->get_template_part( $arguments ),
				$this->wp_kses_for_title
			);
		}
	}
}
