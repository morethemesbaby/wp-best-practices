<?php
/**
 * The WordPress HTML5 Support functionality
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeFunctionalitiesHTML5Support' ) ) {
	/**
	 * The WordPress HTML5 Support functionality class.
	 *
	 * Switches default core markup for search form, comment form, and comments to output valid HTML5.
	 *
	 * @since 1.0.0
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
	 */
	class MoThemeFunctionalitiesHTML5Support {
		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			add_theme_support(
				'html5',
				apply_filters(
					'mo_theme_html5_support',
					array(
						'search-form',
						'comment-form',
						'comment-list',
						'gallery',
						'caption',
					)
				)
			);
		}
	}
}
