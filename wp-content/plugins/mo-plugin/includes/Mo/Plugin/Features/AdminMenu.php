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
			'page_title'              => 'Mo Theme Settings',
			'menu_title'              => 'Mo Theme Settings',
			'menu_id'                 => 'mo-theme-settings',
			'settings_id'             => 'mo-theme-settings',
			'settings_features'       => 'mo-theme-settings-features',
			'settings_features_title' => 'Theme Features',
			'theme_features'          => array(),
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
			$this->page_title              = __( $this->arguments['page_title'], 'mo-plugin' );
			$this->menu_title              = __( $this->arguments['menu_title'], 'mo-plugin' );
			$this->menu_id                 = $this->arguments['menu_id'];
			$this->settings_id             = $this->arguments['settings_id'];
			$this->settings_features       = $this->arguments['settings_features'];
			$this->settings_features_title = __( $this->arguments['settings_features_title'], 'mo-plugin' );
			$this->theme_features          = $this->arguments['theme_features'];
		}

		/**
		 * Displays the `Features` settings header
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function settings_features_callback() {
			// Empty since we have just a single section. no need for description.
		}

		/**
		 * Sets up custom options and settings
		 *
		 * @since 1.1.0
		 *
		 * @link https://developer.wordpress.org/plugins/settings/custom-settings-page/
		 *
		 * @return void
		 */
		public function init_settings() {
			if ( empty( $this->theme_features ) ) {
				return;
			}

			/**
			 * Registers a new settings entry.
			 */
			register_setting( $this->menu_id, $this->settings_id );

			/**
			 * Adds a new section inside the settings.
			 */
			add_settings_section(
				$this->settings_features,
				$this->settings_features_title,
				array( $this, 'settings_features_callback' ),
				$this->menu_id
			);

			/**
			 * Adds new fields inside the section.
			 */
			$mo_settings = new Mo_Plugin_Admin_Settings(
				array(
					'settings_option_group' => $this->settings_id,
					'settings_section'      => $this->settings_features,
				)
			);

			foreach ( $this->theme_features as $key => $value ) {
				add_settings_field(
					$this->settings_features . '-' . $key,
					$key,
					array( $mo_settings, 'display_input_field' ),
					$this->menu_id,
					$this->settings_features,
					array(
						'key'   => $key,
						'value' => $value,
					)
				);
			}
		}

		/**
		 * Displays the settings for the admin menu
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function display_settings() {
			$mo_settings = new Mo_Plugin_Admin_Settings(
				array(
					'settings_option_group' => $this->settings_id,
				)
			);

			$mo_settings->display();
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
				array( $this, 'display_settings' ),
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
			add_action( 'admin_init', array( $this, 'init_settings' ) );
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
