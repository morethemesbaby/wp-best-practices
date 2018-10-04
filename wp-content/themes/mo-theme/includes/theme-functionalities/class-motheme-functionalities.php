<?php
/**
 * The WordPress standard functionalities setup class
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeFunctionalities' ) ) {
	/**
	 * The main functionalities class.
	 *
	 * @since 1.0.0
	 */
	class MoThemeFunctionalities {

		/**
		 * The class arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array $arguments An array of arguments
		 */
		public $arguments = array(
			'set' => '',
		);

		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments An array of arguments.
		 * @return void
		 */
		public function __construct( $arguments ) {
			$this->arguments = array_merge( $this->arguments, $arguments );

			switch ( $this->arguments['set'] ) {
				case FUNCTIONALITY_SET_WPORG:
					$this->setup_wporg();
					break;
			}
		}

		/**
		 * Sets up WordPress.org specific functionalities.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function setup_wporg() {
			$content_width = new MoThemeFunctionalitiesContentWidth();
			$post_formats  = new MoThemeFunctionalitiesPostFormats();
		}
	}
} // End if().
