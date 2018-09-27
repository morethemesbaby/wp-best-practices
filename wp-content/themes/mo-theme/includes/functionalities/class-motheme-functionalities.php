<?php
/**
 * The WordPress standard functionalities setup class
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeFunctionalities' ) ) {
	/**
	 * The main functionalities class
	 *
	 * @package MoTheme
	 * @since 1.0.0
	 */
	class MoThemeFunctionalities {

		/**
		 * The class arguments
		 *
		 * @var array
		 */
		public $arguments = array(
			'set' => '',
		);

		/**
		 * Sets up the class
		 *
		 * @param array $arguments An array of arguments.
		 */
		public function __construct( $arguments ) {
			$this->arguments = array_merge( $this->arguments, $arguments );

			switch ( $this->arguments['set'] ) {
				case FUNCTIONALITY_SET_WPORG:
					$this->wporg();
					break;
			}
		}

		/**
		 * WordPress.org specific functionalities
		 *
		 * @return void
		 */
		public function wporg() {
			$content_width = new MoThemeFunctionalitiesContentWidth();
			$post_formats = new MoThemeFunctionalitiesPostFormats();
		}
	}
}
