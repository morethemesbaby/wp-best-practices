<?php
/**
 * The WordPress content width functionality.
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeFunctionalitiesContentWidth' ) ) {
	/**
	 * The content width functionality class
	 */
	class MoThemeFunctionalitiesContentWidth {
		/**
		 * Sets up the class.
		 *
		 * @package MoTheme
		 * @since 1.0.0
		 */
		public function __construct() {
			$GLOBALS['content_width'] = apply_filters( 'mo_theme_content_width', 640 );
			echo 'zzz:' . $GLOBALS['content_width'];
		}
	}
}
