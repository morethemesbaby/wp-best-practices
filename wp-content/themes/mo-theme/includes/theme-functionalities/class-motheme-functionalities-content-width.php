<?php
/**
 * The WordPress content width functionality
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeFunctionalitiesContentWidth' ) ) {
	/**
	 * The WordPress Content Width functionality class
	 *
	 * @since 1.0.0
	 */
	class MoThemeFunctionalitiesContentWidth {
		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			$GLOBALS['content_width'] = apply_filters( 'mo_theme_content_width', 640 );
		}
	}
}
