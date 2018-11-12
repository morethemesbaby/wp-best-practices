<?php
/**
 * The Settings Menu
 *
 * @package Mo\Plugin\Features
 * @since 1.1.0
 */

if ( ! class_exists( 'Mo_Plugin_Features_SettingsMenu' ) ) {
	/**
	 * The Settings Menu class.
	 *
	 * Displays and manages the settings menu for this theme.
	 *
	 * @since 1.0.0
	 */
	class Mo_Plugin_Features_SettingsMenu extends Mo_Base {

		/**
		 * Class arguments.
		 *
		 * @since 1.1.0
		 *
		 * @var array $arguments An Array of arguments.
		 */
		public $arguments = array(
			'menu_id'    => 'mo_theme_settings',
			'menu_title' => 'Mo Theme Settings',
			'page_title' => 'Mo Theme Settings',
			'sections'   => array(),
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
		 * Sets up arguments.
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function setup_arguments() {
			$this->page_title = __( $this->arguments['page_title'], 'mo-plugin' );
			$this->menu_title = __( $this->arguments['menu_title'], 'mo-plugin' );
			$this->menu_id    = $this->arguments['menu_id'];
			$this->sections   = $this->arguments['sections'];

			$this->mo_settings = new Mo_Plugin_Admin_Settings( $this->arguments );
		}

		/**
		 * Adds the admin menu.
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function add_admin_menu() {
			add_menu_page(
				$this->page_title,
				$this->menu_title,
				'manage_options',
				$this->menu_id,
				array( $this->mo_settings, 'display' ),
				'',
				100
			);
		}

		/**
		 * Activates the Admin menu
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function activate() {
			add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
			add_action( 'admin_init', array( $this->mo_settings, 'init_settings' ) );
		}

		/**
		 * Deactivates the Admin menu
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function deactivate() {
			remove_menu_page( $this->menu_id );
		}
	}
} // End if().
