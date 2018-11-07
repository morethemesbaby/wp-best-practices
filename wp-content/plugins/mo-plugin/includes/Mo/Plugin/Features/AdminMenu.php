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
		public $arguments = array(
			'admin_menu_page_title' => 'Mo Theme Settings',
			'admin_menu_menu_title' => 'Mo Theme Settings',
			'admin_menu_id'         => 'mo-plugin-admin-menu',
		);

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
			$this->setup_arguments();
		}

		/**
		 * Displays the admin menu content
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function display_admin_menu() {
			echo '<h2>' . $this->admin_menu_page_title . '</h2>';
		}

		/**
		 * Adds the admin menu.
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function add_admin_menu() {
			add_menu_page(
				$this->admin_menu_page_title,
				$this->admin_menu_menu_title,
				'manage_options',
				$this->admin_menu_id,
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
			remove_menu_page( $this->admin_menu_id );
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

		/**
		 * Set up arguments
		 */
		public function setup_arguments() {
			$this->admin_menu_page_title = __( $this->arguments['admin_menu_page_title'], 'mo-plugin' );
			$this->admin_menu_menu_title = __( $this->arguments['admin_menu_menu_title'], 'mo-plugin' );
			$this->admin_menu_id         = $this->arguments['admin_menu_id'];
		}
	}
} // End if().
