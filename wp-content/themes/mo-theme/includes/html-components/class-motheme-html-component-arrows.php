<?php
/**
 * The HTML component arrows class
 * 
 * Arrows are one of the design landmarks of the site.
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeHTMLComponentArrows' ) ) {
	/**
	 * The HTML component arrow class.
	 *
	 * @since 1.0.0
	 */
	class MoThemeHTMLComponentArrows extends MoThemeBase {

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
		 * Displays the arrows.
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
