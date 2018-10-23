<?php
/**
 * The functionalities setup
 *
 * @package Mo\Theme
 * @since 1.0.0
 * @see Mo_Theme_Base
 */

if ( ! class_exists( 'Mo_Theme_Functionalities' ) ) {
	/**
	 * The functionalities setup class.
	 *
	 * Implements the functionalities of the theme.
	 *
	 * This aims to be the most important class of the theme.
	 * The idea is to have a central place where all functionalities a theme implements can be quickly overviewed or managed.
	 *
	 * Looking into this file should reveal what the theme does.
	 *
	 * @since 1.0.0
	 */
	class Mo_Theme_Functionalities extends Mo_Theme_Base {

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
			$this->arguments = $this->array_merge( $this->arguments, $arguments );

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
			$content_width     = new Mo_Theme_Functionalities_ContentWidth();
			$post_formats      = new Mo_Theme_Functionalities_PostFormats();
			$sidebars          = new Mo_Theme_Functionalities_Sidebars();
			$title_tag         = new Mo_Theme_Functionalities_TitleTag();
			$post_thumbnails   = new Mo_Theme_Functionalities_PostThumbnails();
			$custom_header     = new Mo_Theme_Functionalities_CustomHeader();
			$custom_background = new Mo_Theme_Functionalities_CustomBackground();
			$editor_style      = new Mo_Theme_Functionalities_EditorStyle();
			$comment_scripts   = new Mo_Theme_Functionalities_CommentScripts();
			$custom_logo       = new Mo_Theme_Functionalities_CustomLogo();
			$html5_support     = new Mo_Theme_Functionalities_HTML5Support();
			$navigation_menus  = new Mo_Theme_Functionalities_NavigationMenus();
			$refresh_widgets   = new Mo_Theme_Functionalities_RefreshWidgets();
		}
	}
} // End if().
