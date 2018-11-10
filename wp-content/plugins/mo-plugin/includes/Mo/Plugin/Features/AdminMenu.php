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
		 * Displays the `Test` field for the 'Features` settings
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function settings_features_test_field_callback() {
			$setting_name = $this->settings_features . '-test';
			$setting = get_option( $setting_name );
			?>
			<input type="text" name="<?php echo $setting_name; ?>" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
			<?php
		}

		/**
		 * Displays the `Features` settings header
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function settings_features_callback() {
			echo 'Section description';
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
			register_setting( $this->menu_id, $this->settings_id );

			add_settings_section(
				$this->settings_features,
				$this->settings_features_title,
				array( $this, 'settings_features_callback' ),
				$this->menu_id
			);

			add_settings_field(
				$this->settings_features . '-test',
				'Test field',
				array( $this, 'settings_features_test_field_callback' ),
				$this->menu_id,
				$this->settings_features
			);
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

		/**
		 * Set up arguments
		 */
		public function setup_arguments() {
			$this->page_title              = __( $this->arguments['page_title'], 'mo-plugin' );
			$this->menu_title              = __( $this->arguments['menu_title'], 'mo-plugin' );
			$this->menu_id                 = $this->arguments['menu_id'];
			$this->settings_id             = $this->arguments['settings_id'];
			$this->settings_features       = $this->arguments['settings_features'];
			$this->settings_features_title = __( $this->arguments['settings_features_title'], 'mo-plugin' );
		}
	}
} // End if().
