<?php
/**
 * The Header class
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeHeader' ) ) {
	/**
	 * The header class.
	 *
	 * @since 1.0.0
	 */
	class MoThemeHeader extends MoThemeBase {

		/**
		 * Class arguments.
		 *
		 * @since 1.0.0
		 *
		 * @var array An array of arguments.
		 */
		public $arguments = array(
			'header_menu_sidebar_id' => 'sidebar-2',
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
		 * Returns the class attribute for the header.
		 *
		 * @since 1.0.0
		 *
		 * @return string
		 */
		public function get_class() {
			$header_image = get_header_image() ? ' with-header-image' : ' without-header-image';
			$logo         = has_custom_logo() ? ' with-logo' : ' without-logo';
			$header_text  = display_header_text() ? ' with-header-text' : ' without-header-text';
			$header_menu  = $this->has_header_menu() ? ' with-header-menu' : ' without-header-menu';

			return $header_image . $logo . $header_text . $header_menu;
		}

		/**
		 * Checks if a header menu is available.
		 *
		 * @since 1.0.0
		 *
		 * @return boolean
		 */
		public function has_header_menu() {
			return apply_filters(
				'mo_theme_header_has_menu',
				is_active_sidebar( $this->arguments['header_menu_sidebar_id'] )
			);
		}

		/**
		 * Displays the header menu contents.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function display_header_menu_contents() {
			if ( $this->has_header_menu() ) {
				dynamic_sidebar( $this->arguments['header_menu_sidebar_id'] );
			}
		}
	}
} // End if().
