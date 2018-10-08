<?php
/**
 * The WordPress Navigation Menus functionality
 *
 * @package MoTheme
 * @since 1.0.0
 */

if ( ! class_exists( 'MoThemeFunctionalitiesNavigationMenus' ) ) {
	/**
	 * The WordPress Navigation Menus functionality class.
	 *
	 * Registers navigation menu locations for a theme.
	 *
	 * @since 1.0.0
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
	 */
	class MoThemeFunctionalitiesNavigationMenus {
		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			register_nav_menus(
				apply_filters(
					'mo_theme_register_navigation_menus',
					array(
						/* translators: The primary menu name */
						'menu-1' => esc_html_x( 'Primary', 'The primary menu name', 'mo-theme' ),
					)
				)
			);
		}
	}
}
