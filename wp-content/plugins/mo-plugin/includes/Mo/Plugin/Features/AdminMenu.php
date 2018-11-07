<?php
/**
 * The Admin Menu
 *
 * @package Mo\Plugin\Features
 * @since 1.1.0
 */

if ( ! class_exists( 'Mo_Plugin_Features_AdminMenu' ) ) {
	/**
	 * The Admin Menu class.
	 *
	 * Displays and manages the admin menu for this theme.
	 *
	 * @since 1.0.0
	 */
	class Mo_Plugin_Features_AdminMenu extends Mo_Base {

		/**
		 * Class arguments.
		 *
		 * @since 1.1.0
		 *
		 * @var array $arguments An Array of arguments.
		 */
		public $arguments = array();

		/**
		 * Sets up the class.
		 *
		 * @since 1.1.0
		 *
		 * @param array $arguments The class setup arguments array.
		 * @return void
		 */
		public function __construct( $arguments = array() ) {
			$this->arguments = $this->array_merge( $this->arguments, $arguments );
		}

		/**
		 * Adds the admin menu.
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function add_admin_menu() {
			add_menu_page(
				__( 'Mo Theme Settings', 'mo-plugin' ),
				__( 'Mo Theme Settings', 'mo-plugin' ),
				'manage_options',
				'mo-plugin-admin-menu',
				array( $this, 'display_admin_menu' )
			);
		}

		/**
		 * Removes the admin menu.
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function remove_admin_menu() {
			remove_menu_page( 'mo-plugin-admin-menu' );
		}

		/**
		 * Activates the Admin menu
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function activate() {
			$this->add_admin_menu();
		}

		/**
		 * Deactivates the Admin menu
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function deactivate() {
			$this->remove_admin_menu();
		}
	}
} // End if().
