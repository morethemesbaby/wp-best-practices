<?php
/**
 * The Title HTML component
 *
 * @package Mo\Theme\Components
 * @since 1.0.0
 */

if ( ! class_exists( 'Mo_Theme_Components_Title' ) ) {
	/**
	 * The Title HTML component class.
	 *
	 * To keep HTML semantic components like `<article>`, `<aside>` etc. need a title.
	 * This title is often not displayed it just makes the HTML outlined well.
	 * The W3C outliner algorithm has changed a few times. This class make it easily adapt to future changes.
	 *
	 * For example if the outliner will need `<header><h3>Component title</h3></header>` instead of
	 * `<h3>Component title</h3>` here we can make the changes which will ripple to the entire code.
	 *
	 * @since 1.0.0
	 */
	class Mo_Theme_Components_Title extends Mo_Theme_Components {

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
			$this->arguments = $this->array_merge( $this->arguments, $arguments );
		}

		/**
		 * Displays the title of an element.
		 *
		 * Instead of writing HTML code here we return a template part.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The class setup arguments array.
		 * @return void
		 */
		public function display( $arguments = array() ) {
			$this->arguments = $this->array_merge( $this->arguments, $arguments );

			$arguments = array(
				'query_var_name'     => 'component-title-query-vars',
				'query_var_value'    => $this->arguments,
				'template_part_slug' => 'template-parts/html-components/title/title',
				'template_part_name' => '',
			);

			echo wp_kses(
				$this->get_template_part( $arguments ),
				$this->wp_kses_for_title
			);
		}
	}
} // End if().
