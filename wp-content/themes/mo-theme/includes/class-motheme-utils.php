<?php
/**
 * The Utils class
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeUtils' ) ) {
	/**
	 * The Utils class.
	 *
	 * @since 1.0.0
	 */
	class MoThemeUtils extends MoThemeBase {

		/**
		 * Class arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array An array of arguments.
		 */
		public $arguments = array(
			'' => '',
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
		 * Returns the class attribute for a post.
		 * 
		 * @since 1.0.0
		 * 
		 * @return string
		 */
		public function get_class() {
			//
		}
	}
}
