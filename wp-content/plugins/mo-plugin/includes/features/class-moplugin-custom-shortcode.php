<?php
/**
 * The Custom Shortcode
 *
 * @package MoPlugin
 * @since 1.0.0
 */

if ( ! class_exists( 'MoPluginCustomShortcode' ) ) {
	/**
	 * The Custom Shortcode class.
	 *
	 * Returns content for the `books` shortcode.
	 *
	 * @since 1.0.0
	 */
	class MoPluginCustomShortcode extends MoBase {

		/**
		 * Class arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array $arguments An Array of arguments.
		 */
		public $arguments = array();

		/**
		 * Books shortcode arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array $arguments An Array of arguments.
		 */
		public $arguments_books = array(
			'number_of_books' => 0,
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
		 * Returns content for the shortcode.
		 *
		 * Usage: `[books number_of_books="5"]
		 * Will display 5 books.
		 *
		 * Only raw data will be returned as a global variable.
		 * And an action hook which the theme can use to display the data.
		 * This way the shortcode display will be wired into the HTML code structure of the theme.
		 *
		 * @since 1.0.0
		 *
		 * @link https://codex.wordpress.org/Function_Reference/add_shortcode
		 *
		 * @param array $arguments The shortcode arguments array.
		 * @return void.
		 */
		public function books( $arguments ) {
			$arguments = shortcode_atts( $arguments_books, $arguments );

			$cpt = new MoPluginCustomPostType();

			global $books;
			$books = $cpt->get_books(
				array(
					'number_of_books' => $arguments['number_of_books'],
				)
			);

			do_action( PLUGIN_TEXT_DOMAIN . '_books_action_after', 10, 0 );
		}
	}
} // End if().
