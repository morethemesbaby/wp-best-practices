<?php
/**
 * The WordPress Editor Style functionality
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeFunctionalitiesEditorStyle' ) ) {
	/**
	 * The WordPress Editor Style functionality class.
	 *
	 * Adds callback for custom TinyMCE editor stylesheets.
	 *
	 * @since 1.0.0
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_editor_style/
	 */
	class MoThemeFunctionalitiesEditorStyle {
		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			add_editor_style();
		}
	}
}
