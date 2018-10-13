<?php
/**
 * The theme functionalities setup class
 *
 * @package MoProTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoProThemeFunctionalities' ) ) {
	/**
	 * The main functionalities class.
	 *
	 * @since 1.0.0
	 */
	class MoProThemeFunctionalities extends MoThemeBase {

		/**
		 * The class arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array $arguments An array of arguments
		 */
		public $arguments = array();

		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments An array of arguments.
		 * @return void
		 */
		public function __construct( $arguments = array() ) {
			$this->arguments = $this->array_merge( $this->arguments, $arguments );
			$this->setup();
		}

		/**
		 * Sets up functionalities.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function setup() {
			add_filter( 'mo_theme_home_title', array( $this, 'change_home_title' ) );
			add_action( 'after_setup_theme', array( $this, 'define_theme_support' ), 10, 0 );
			add_action( 'mo-plugin_books_action_after', array( $this, 'display_books_shortcode' ), 10, 0 );
			add_action( 'widgets_init', array( $this, 'register_books_widget' ) );
		}

		/**
		 * Enables the widget for books.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function register_books_widget() {
			register_widget( 'MoProThemeCustomWidget' );
		}

		/**
		 * Displays the shortcode for books.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function display_books_shortcode() {
			global $books;
			print_r($books);
		}

		/**
		 * Defines what features to be implemented by the plugin.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function define_theme_support() {
			add_theme_support(
				'MO_PRO_THEME_FEATURE_SET',
				array(
					'custom-post-type' => true,
					'shortcode'        => true,
				)
			);
		}

		/**
		 * Changes the Home section title.
		 *
		 * @since 1.0.0
		 *
		 * @return string
		 */
		public function change_home_title() {
			return array( 'title' => 'Pro Home' );
		}
	}
} // End if().
