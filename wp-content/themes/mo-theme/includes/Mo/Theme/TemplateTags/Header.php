<?php
/**
 * The Header Template tag
 *
 * @package Mo\Theme\TemplateTags
 * @since 1.0.0
 */

if ( ! class_exists( 'Mo_Theme_TemplateTags_Header' ) ) {
	/**
	 * The Header Template tag class.
	 *
	 * Contains code used to display the site's header.
	 *
	 * @since 1.0.0
	 */
	class Mo_Theme_TemplateTags_Header extends Mo_Theme_Base {

		/**
		 * Class arguments.
		 *
		 * The header menu displays a widget area.
		 * Here we can define the ID of that widget area.
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
			$this->arguments = $this->array_merge( $this->arguments, $arguments );
		}

		/**
		 * Returns the class attribute for the header.
		 *
		 * The class attribute will describe which features are enabled in the header.
		 * Later this information is used to style properly the header.
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
		 * The header menu is preferably a widget area which can be customized in the admin.
		 * With a filter this behavior can be overwritten.
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
